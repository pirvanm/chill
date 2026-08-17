<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\Http\Requests\AddChannelVideosRequest;
use App\Http\Resources\ChannelResource;
use App\Models\Channel;
use App\Services\Youtube\VideoIngestService;

class ChannelController extends Controller
{
    private VideoIngestService $ingest;

    public function __construct(VideoIngestService $ingest)
    {
        $this->ingest = $ingest;
    }

    public function getChannels()
    {
        $channels = Channel::latest()->paginate(150);

        return ChannelResource::collection($channels);
    }

    public function addChannelVideos(AddChannelVideosRequest $request)
    {
        $channel = $this->ingest->findOrCreateChannel($request->channel);
        $categoryId = $request->category['id'] ?? null;
        $subcategories = $request->subcategories ?? [];

        if ($request->token) {
            $videoList = Youtube::paginateResults([
                'type' => 'video',
                'channelId' => $request->channel,
                'part' => 'id,snippet',
                'maxResults' => 50,
            ], $request->token);

            $this->importResults($videoList['results'], $channel, $categoryId, $subcategories);

            return response()->json(['pageInfo' => $videoList['info']]);
        }

        $videoList = Youtube::listChannelVideos($request->channel, 50, null, ['id', 'snippet'], true);
        $this->importResults($videoList['results'], $channel, $categoryId, $subcategories);

        return response()->json(['pageInfo' => $videoList['info']]);
    }

    private function importResults(array $results, Channel $channel, ?int $categoryId, array $subcategories): void
    {
        foreach ($results as $result) {
            $videoId = $result->id->videoId;
            if (!$this->ingest->videoExists($videoId)) {
                $this->ingest->ingestVideo($videoId, $categoryId, $subcategories, null, $channel);
            }
        }
    }
}
