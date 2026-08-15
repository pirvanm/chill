# Video collection progress (Task 84: "Videos From Channels")

Last updated: 2026-08-15 12:57 local (GTBDT, UTC+3)

## Status as of last run (collect_500_run.log + continue_run.log)

- TARGET_PER_CHANNEL = 500 (see .env)
- **188/1000** channels at >= 500 videos
- **856 of 1263** channels permanently marked `exhausted` in `collector_status`
  (fewer than 500 uploads exist on YouTube for those channels -- future runs
  skip them automatically)
- Remaining channels still to check: 1263 - 856 - 188 = 219 (not yet at
  target and not yet exhausted)

## Quota situation

- YouTube Data API daily quota (10,000 units) was fully consumed twice today:
  once during the original `collect_500_run.log` run, and again immediately
  on retry (`continue_run.log`, 0 videos inserted, stopped instantly with
  `quotaExceeded`).
- Quota resets at midnight Pacific Time, i.e. ~10:00 local (GTBDT, UTC+3)
  the following day. Next natural reset: 2026-08-16 ~10:00 local.
- User asked to retry in 6h (~2026-08-15 18:59 local) regardless -- this is
  BEFORE the natural quota reset, so that attempt will likely also hit
  `quotaExceeded` immediately and stop (harmless, no side effects). The
  first attempt with a real chance of quota being available is the
  ~10:00 local reset on 2026-08-16.

## How to resume

```
cd f:/projects/chill/web/master/collector
bash run_loop.sh > continue_run.log 2>&1
```

`run_loop.sh` loops `collect_videos.py` up to 50x, stopping automatically on
`quotaExceeded`/`HttpError 403`/`dailyLimitExceeded` or when 0 channels are
left to check. `collect_videos.py` tracks per-channel status in the
`collector_status` DB table, so partial progress across quota-limited runs
is never lost or redone.
