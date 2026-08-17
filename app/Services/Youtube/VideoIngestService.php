<?php

namespace App\Services\Youtube;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Channel;
use App\Models\Tag;
use App\Models\Video;

class VideoIngestService
{
    public function videoExists(string $videoId): bool
    {
        return Video::where('videoId', $videoId)->exists();
    }

    public function findOrCreateChannel(string $channelId): Channel
    {
        $channel = Channel::where('channelId', $channelId)->first();
        if ($channel) {
            return $channel;
        }

        $chan = Youtube::getChannelById($channelId);

        $channel = new Channel;
        $channel->channelId = $channelId;
        $channel->title = $chan->snippet->title;
        $channel->description = $chan->snippet->description;
        $channel->publishedAt = date('Y-m-d h:i:s', strtotime($chan->snippet->publishedAt));
        $channel->thumbnail = $chan->snippet->thumbnails->medium->url;
        $channel->save();

        return $channel;
    }

    /**
     * Fetch a video from YouTube and store it, attaching its channel, tags and subcategories.
     * Pass $channel when the caller already knows it (e.g. importing a known channel's
     * uploads) -- otherwise it's resolved from the video's own snippet.channelId.
     *
     * @param array $subcategories list of ['id' => int] entries
     */
    public function ingestVideo(
        string $videoId,
        ?int $categoryId = null,
        array $subcategories = [],
        ?string $status = null,
        ?Channel $channel = null
    ): Video {
        $info = Youtube::getVideoInfo($videoId);
        $channel = $channel ?? $this->findOrCreateChannel($info->snippet->channelId);
        $parsed = DurationParser::parse($info->contentDetails->duration ?? null);

        $video = new Video;
        $video->videoId = $videoId;
        $video->title = $info->snippet->title;
        $video->views = $info->statistics->viewCount;
        $video->duration = $parsed['duration'];
        $video->description = $info->snippet->description;
        $video->thumbnail = $info->snippet->thumbnails->medium->url;
        $video->publishedAt = date('Y-m-d h:i:s', strtotime($info->snippet->publishedAt));
        $video->channel_id = $channel->id;
        $video->category_id = $categoryId ?: '';
        $video->type_duration = $parsed['durationType'];
        if ($status) {
            $video->status = $status;
        }
        $video->save();

        $this->attachTags($video, $info->snippet->tags ?? null);

        foreach ($subcategories as $subcategory) {
            $video->subcategories()->attach($subcategory['id']);
        }

        return $video;
    }

    private function attachTags(Video $video, ?array $tags): void
    {
        foreach ($tags ?? [] as $tagName) {
            $tag = Tag::where('name', $tagName)->first();
            if (!$tag) {
                $tag = new Tag;
                $tag->name = $tagName;
                $tag->save();
            }

            $tag->videos()->attach($video->id);
        }
    }
}
