<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChannelResource;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Alaouy\Youtube\Facades\Youtube;
use App\Models\Tag;
use App\Models\Video;

class ChannelController extends Controller
{
    public function getChannels()
    {
        $channels = Channel::latest()->paginate(150);

        return ChannelResource::collection($channels);
    }

    public function addChannelVideos(Request $request)
    {
        $channel = $request->channel;
        if ($request->token) {

            $newChannel = Channel::where('channelId', $channel)->first();

            if (!$newChannel) {
                $chan = Youtube::getChannelById($channel);
                $newChannel = new Channel;
                $newChannel->channelId = $channel;
                $newChannel->title = $chan->snippet->title;
                $newChannel->description = $chan->snippet->description;
                $channelDate = date('Y-m-d h:i:s', strtotime($chan->snippet->publishedAt));
                $newChannel->publishedAt = $channelDate;
                $newChannel->thumbnail = $chan->snippet->thumbnails->medium->url;
                $newChannel->save();
            }

            $token = $request->token;

            $part = ['id', 'snippet'];

            $params = [
                'type' => 'video',
                'channelId' => $channel,
                'part' => implode(',', $part),
                'maxResults' => 50,
            ];

            $videoList = Youtube::paginateResults($params, $token);
            $info = $videoList['info'];


            foreach ($videoList['results'] as $vi) {
                $videoId = $vi->id->videoId;
                $video = Video::where('videoId', $videoId)->first();

                /* Validation if Video Exists*/
                if (!$video) {

                    $video = Youtube::getVideoInfo($videoId);

                    $yduration = $video->contentDetails->duration;
                    if ($yduration) {
                        preg_match_all('/(\d+)/', $yduration, $parts);

                        // Put in zeros if we have less than 3 numbers.
                        if (count($parts[0]) == 1) {
                            array_unshift($parts[0], "0", "0");
                        } elseif (count($parts[0]) == 2) {
                            array_unshift($parts[0], "0");
                        }

                        $sec_init = $parts[0][2];
                        $seconds = $sec_init % 60;
                        $seconds_overflow = floor($sec_init / 60);

                        $min_init = $parts[0][1] + $seconds_overflow;
                        $minutes = ($min_init) % 60;
                        $minutes_overflow = floor(($min_init) / 60);

                        $hours = $parts[0][0] + $minutes_overflow;

                        if ($hours != 0)
                            $duration = $hours . ':' . $minutes . ':' . $seconds;
                        else
                            $duration = '00' . ':'  . $minutes . ':' . $seconds;
                    } else {
                        $duration = '00:00:00';
                    }

                    /* Insert a new video in Db */
                    $v = new Video;
                    $v->videoId = $videoId;
                    $v->title = $video->snippet->title;
                    $v->views = $video->statistics->viewCount;
                    $v->duration = $duration;
                    $v->description = $video->snippet->description;
                    $v->thumbnail = $video->snippet->thumbnails->medium->url;
                    $videoDate = date('Y-m-d h:i:s', strtotime($video->snippet->publishedAt));
                    $v->publishedAt = $videoDate;
                    $v->channel_id = $newChannel->id;

                    $v->save();

                    if (isset($video->snippet->tags)) {
                        foreach ($video->snippet->tags as $tag) {
                            $t = Tag::where('name', $tag)->first();
                            if (!$t) {
                                $t = new Tag;
                                $t->name = $tag;
                                $t->save();
                            }

                            $t->videos()->attach($v->id);
                        }
                    }
                }
            }

            return response()->json([
                'pageInfo' => $info,
            ]);
        } else {
            //Save Channel
            $newChannel = Channel::where('channelId', $channel)->first();

            if (!$newChannel) {
                $chan = Youtube::getChannelById($channel);
                $newChannel = new Channel;
                $newChannel->channelId = $channel;
                $newChannel->title = $chan->snippet->title;
                $newChannel->description = $chan->snippet->description;
                $channelDate = date('Y-m-d h:i:s', strtotime($chan->snippet->publishedAt));
                $newChannel->publishedAt = $channelDate;
                $newChannel->thumbnail = $chan->snippet->thumbnails->medium->url;
                $newChannel->save();
            }

            $videoList = Youtube::listChannelVideos($channel, 50, null,  $part = ['id', 'snippet'], true);
            $info = $videoList['info'];

            // $token = $videoList['info']['nextPageToken'];

            //Loop all videos

            foreach ($videoList['results'] as $vi) {
                $videoId = $vi->id->videoId;
                $video = Video::where('videoId', $videoId)->first();

                /* Validation if Video Exists*/
                if (!$video) {

                    $video = Youtube::getVideoInfo($videoId);

                    $yduration = $video->contentDetails->duration;
                    if ($yduration) {
                        preg_match_all('/(\d+)/', $yduration, $parts);

                        // Put in zeros if we have less than 3 numbers.
                        if (count($parts[0]) == 1) {
                            array_unshift($parts[0], "0", "0");
                        } elseif (count($parts[0]) == 2) {
                            array_unshift($parts[0], "0");
                        }

                        $sec_init = $parts[0][2];
                        $seconds = $sec_init % 60;
                        $seconds_overflow = floor($sec_init / 60);

                        $min_init = $parts[0][1] + $seconds_overflow;
                        $minutes = ($min_init) % 60;
                        $minutes_overflow = floor(($min_init) / 60);

                        $hours = $parts[0][0] + $minutes_overflow;

                        if ($hours != 0)
                            $duration = $hours . ':' . $minutes . ':' . $seconds;
                        else
                            $duration = '00' . ':'  . $minutes . ':' . $seconds;
                    } else {
                        $duration = '00:00:00';
                    }

                    /* Insert a new video in Db */
                    $v = new Video;
                    $v->videoId = $videoId;
                    $v->title = $video->snippet->title;
                    $v->views = $video->statistics->viewCount;
                    $v->duration = $duration;
                    $v->description = $video->snippet->description;
                    $v->thumbnail = $video->snippet->thumbnails->medium->url;
                    $videoDate = date('Y-m-d h:i:s', strtotime($video->snippet->publishedAt));
                    $v->publishedAt = $videoDate;
                    $v->channel_id = $newChannel->id;

                    $v->save();

                    if (isset($video->snippet->tags)) {
                        foreach ($video->snippet->tags as $tag) {
                            $t = Tag::where('name', $tag)->first();
                            if (!$t) {
                                $t = new Tag;
                                $t->name = $tag;
                                $t->save();
                            }

                            $t->videos()->attach($v->id);
                        }
                    }
                }
            }

            return response()->json([
                'pageInfo' => $info,
            ]);
        }
    }
}
