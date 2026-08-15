"""
Epic: Collect Python (laracrm epics/25) / Task 84: "Videos From Channels"

Tops up each channel in levelcod_chill.channels up to TARGET_PER_CHANNEL
videos, using each channel's uploads playlist (playlistItems.list, 1 quota
unit/call) rather than search.list (100 units/call, what the existing PHP
admin panel's ChannelController::addChannelVideos uses) -- the difference is
what makes a ~1000-channel bulk run fit in a single day's default 10,000-unit
quota instead of blowing through it on the first ~15 channels.

Duration string format, type_duration bucketing, and medium-thumbnail choice
are copied to match ChannelController::addChannelVideos exactly, so rows
inserted here are indistinguishable from ones added through the admin UI.
"""
import os
import sys
import time

# Windows redirects stdout to cp1252 by default when it's not a real console
# (e.g. piped to a log file); YouTube channel/video titles are frequently
# non-ASCII (CJK, emoji, etc.) and crash print() outright under that codec.
sys.stdout.reconfigure(encoding="utf-8")

import mysql.connector
from dotenv import load_dotenv
from googleapiclient.discovery import build
from googleapiclient.errors import HttpError

load_dotenv()

YOUTUBE_API_KEY = os.environ["YOUTUBE_API_KEY"]
DB_HOST = os.environ["DB_HOST"]
DB_PORT = int(os.environ.get("DB_PORT", "3306"))
DB_USER = os.environ["DB_USER"]
DB_PASS = os.environ["DB_PASS"]
DB_NAME = os.environ["DB_NAME"]

TARGET_PER_CHANNEL = int(os.environ.get("TARGET_PER_CHANNEL", "100"))
MAX_CHANNELS = os.environ.get("MAX_CHANNELS") or None
DRY_RUN = os.environ.get("DRY_RUN", "true").lower() == "true"


def uploads_playlist_id(channel_id: str) -> str | None:
    # YouTube convention: a channel's "uploads" playlist id is its channel id
    # with the UC prefix swapped for UU. No API call needed to look it up.
    if not channel_id.startswith("UC"):
        return None
    return "UU" + channel_id[2:]


def duration_and_bucket(iso_duration: str) -> tuple[str, int]:
    """Reproduces ChannelController::addChannelVideos's duration parsing
    exactly: unpadded M/S, "00" for a zero hours field, and the same
    (slightly gap-y at exact boundaries -- replicated faithfully) bucket
    thresholds."""
    import re

    parts = [int(n) for n in re.findall(r"(\d+)", iso_duration or "")]
    if len(parts) == 1:
        parts = [0, 0] + parts
    elif len(parts) == 2:
        parts = [0] + parts
    elif len(parts) == 0:
        parts = [0, 0, 0]

    h, m, s = parts[0], parts[1], parts[2]
    seconds = s % 60
    seconds_overflow = s // 60
    min_total = m + seconds_overflow
    minutes = min_total % 60
    minutes_overflow = min_total // 60
    hours = h + minutes_overflow

    duration = f"{hours}:{minutes}:{seconds}" if hours != 0 else f"00:{minutes}:{seconds}"

    time_seconds = hours * 3600 + minutes * 60 + seconds
    bucket = 0
    if time_seconds < 360:
        bucket = 1
    if 360 < time_seconds < 900:
        bucket = 2
    if 900 < time_seconds < 3000:
        bucket = 3
    if 3000 < time_seconds < 7200:
        bucket = 4
    if time_seconds > 7200:
        bucket = 5

    return duration, bucket


def fetch_new_playlist_video_ids(youtube, cur, playlist_id: str, needed: int) -> tuple[list[str], bool]:
    """Pages through the uploads playlist collecting up to `needed` video ids
    NOT already in the videos table, filtering against the DB page-by-page
    instead of capping maxResults at `needed` total items -- once a channel's
    newest videos are already captured, the newest-first playlist page is
    entirely "existing", and a needed-sized page would return zero new ids
    forever without ever paging further in. Returns (new_ids, exhausted),
    where exhausted means we walked the whole playlist without finding
    `needed` new ones."""
    new_ids: list[str] = []
    page_token = None
    while len(new_ids) < needed:
        try:
            resp = youtube.playlistItems().list(
                part="contentDetails",
                playlistId=playlist_id,
                maxResults=50,
                pageToken=page_token,
            ).execute()
        except HttpError as e:
            if e.resp.status == 404:
                return new_ids, True  # channel has no uploads playlist (rare, e.g. terminated channel)
            raise
        page_ids = [item["contentDetails"]["videoId"] for item in resp.get("items", [])]
        if not page_ids:
            return new_ids, True
        placeholders = ",".join(["%s"] * len(page_ids))
        cur.execute(f"SELECT videoId FROM videos WHERE videoId IN ({placeholders})", page_ids)
        existing = {row["videoId"] for row in cur.fetchall()}
        new_ids.extend(v for v in page_ids if v not in existing)
        page_token = resp.get("nextPageToken")
        if not page_token:
            return new_ids[:needed], len(new_ids) < needed
    return new_ids[:needed], False


def fetch_video_details(youtube, video_ids: list[str]) -> dict:
    details = {}
    for i in range(0, len(video_ids), 50):
        batch = video_ids[i : i + 50]
        resp = youtube.videos().list(part="snippet,contentDetails,statistics", id=",".join(batch)).execute()
        for item in resp.get("items", []):
            details[item["id"]] = item
    return details


def ensure_status_table(cur) -> None:
    """Persists what we've learned about each channel across runs, so a
    future run doesn't re-spend API calls re-checking a channel we already
    know can never reach TARGET_PER_CHANNEL (its uploads playlist is smaller
    than that -- common for small channels) or has already reached it."""
    cur.execute(
        """
        CREATE TABLE IF NOT EXISTS collector_status (
            channel_id  BIGINT UNSIGNED PRIMARY KEY,
            status      VARCHAR(20) NOT NULL,   -- 'exhausted' | 'target_reached'
            videos_have INT NOT NULL,
            checked_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        """
    )


def set_status(cur, db_id: int, status: str, have: int) -> None:
    cur.execute(
        """
        INSERT INTO collector_status (channel_id, status, videos_have)
        VALUES (%s, %s, %s)
        ON DUPLICATE KEY UPDATE status = VALUES(status), videos_have = VALUES(videos_have)
        """,
        (db_id, status, have),
    )


def main():
    youtube = build("youtube", "v3", developerKey=YOUTUBE_API_KEY)
    conn = mysql.connector.connect(host=DB_HOST, port=DB_PORT, user=DB_USER, password=DB_PASS, database=DB_NAME)
    cur = conn.cursor(dictionary=True)
    ensure_status_table(cur)
    conn.commit()

    cur.execute(
        """
        SELECT c.id AS db_id, c.channelId, c.title,
               (SELECT COUNT(*) FROM videos v WHERE v.channel_id = c.id) AS have
        FROM channels c
        LEFT JOIN collector_status s ON s.channel_id = c.id
        WHERE (s.status IS NULL OR s.status != 'exhausted')
        HAVING have < %s
        ORDER BY have ASC
        """,
        (TARGET_PER_CHANNEL,),
    )
    channels = cur.fetchall()
    if MAX_CHANNELS:
        channels = channels[: int(MAX_CHANNELS)]

    print(f"{'[DRY RUN] ' if DRY_RUN else ''}{len(channels)} channel(s) to check (already-exhausted channels skipped)")

    total_inserted = 0
    newly_reached = 0
    newly_exhausted = 0
    for ch in channels:
        needed = TARGET_PER_CHANNEL - ch["have"]
        playlist_id = uploads_playlist_id(ch["channelId"])
        if not playlist_id:
            print(f"  ! {ch['title']}: channelId {ch['channelId']!r} doesn't look like a channel id, skipping")
            continue

        try:
            new_ids, ran_dry = fetch_new_playlist_video_ids(youtube, cur, playlist_id, needed)
        except HttpError as e:
            print(f"  ! {ch['title']}: {e}")
            continue

        # Walked the whole playlist without finding `needed` new ids -> hit
        # the real end of this channel's uploads playlist. It can never
        # reach TARGET_PER_CHANNEL; stop asking about it on future runs.
        if not new_ids:
            if ran_dry and not DRY_RUN:
                set_status(cur, ch["db_id"], "exhausted", ch["have"])
                conn.commit()
                newly_exhausted += 1
            continue

        details = fetch_video_details(youtube, new_ids)
        inserted_here = 0
        for vid, item in details.items():
            snippet = item["snippet"]
            content = item["contentDetails"]
            stats = item.get("statistics", {})
            duration, bucket = duration_and_bucket(content.get("duration", ""))
            thumb = snippet.get("thumbnails", {}).get("medium", snippet.get("thumbnails", {}).get("default", {}))

            if DRY_RUN:
                inserted_here += 1
                continue

            cur.execute(
                """
                INSERT IGNORE INTO videos
                    (videoId, title, description, thumbnail, publishedAt, channel_id,
                     duration, type_duration, views, created_at, updated_at)
                VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, NOW(), NOW())
                """,
                (
                    vid,
                    snippet["title"][:255],
                    snippet.get("description", ""),
                    thumb.get("url", ""),
                    snippet["publishedAt"].replace("T", " ").replace("Z", ""),
                    ch["db_id"],
                    duration,
                    bucket,
                    int(stats["viewCount"]) if stats.get("viewCount") else None,
                ),
            )
            inserted_here += cur.rowcount

        new_have = ch["have"] + inserted_here
        status_note = ""
        if not DRY_RUN:
            if new_have >= TARGET_PER_CHANNEL:
                set_status(cur, ch["db_id"], "target_reached", new_have)
                newly_reached += 1
                status_note = "  -> target reached"
            elif ran_dry:
                set_status(cur, ch["db_id"], "exhausted", new_have)
                newly_exhausted += 1
                status_note = "  -> exhausted, won't recheck"
            conn.commit()

        total_inserted += inserted_here
        print(f"  {ch['title']}: +{inserted_here}{status_note}")
        time.sleep(0.1)  # stay well clear of per-second quota bursts

    # Progress toward the epic's original goal: 1000 channels at 100 videos.
    cur.execute(
        """
        SELECT
            (SELECT COUNT(*) FROM (
                SELECT channel_id FROM videos GROUP BY channel_id HAVING COUNT(*) >= %s
            ) t) AS at_target,
            (SELECT COUNT(*) FROM channels) AS total_channels,
            (SELECT COUNT(*) FROM collector_status WHERE status = 'exhausted') AS exhausted
        """,
        (TARGET_PER_CHANNEL,),
    )
    progress = cur.fetchone()

    print(f"Done. {total_inserted} video(s){' would be' if DRY_RUN else ''} inserted. "
          f"({newly_reached} channel(s) newly reached target, {newly_exhausted} newly marked exhausted)")
    print(f"Progress: {progress['at_target']}/1000 channels at >= {TARGET_PER_CHANNEL} videos "
          f"({progress['exhausted']} of {progress['total_channels']} channels are permanently below target -- fewer than {TARGET_PER_CHANNEL} uploads exist)")

    cur.close()
    conn.close()


if __name__ == "__main__":
    sys.exit(main())
