<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\Http\Requests\AddVideoRequest;
use App\Http\Requests\SaveCategoryToVideoRequest;
use App\Http\Requests\SaveUserCategoriesRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Detail;
use App\Models\User;
use App\Models\Video;
use App\Services\VideoCatalogService;
use App\Services\Youtube\VideoIngestService;
use Auth;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    private VideoCatalogService $catalog;
    private VideoIngestService $ingest;

    public function __construct(VideoCatalogService $catalog, VideoIngestService $ingest)
    {
        $this->catalog = $catalog;
        $this->ingest = $ingest;
    }

    public function getVideo($id)
    {
        $result = $this->catalog->videoWithRelated($id);

        return response()->json([
            'video' => new VideoResource($result['video']),
            'videos' => VideoResource::collection($result['related']),
            'categories' => $result['categories'],
        ]);
    }

    public function getVideoChillHop($id)
    {
        $result = $this->catalog->chillHopWithRelated($id);

        return response()->json(['video' => $result['video'], 'videos' => $result['related']]);
    }

    public function addVideo(AddVideoRequest $request)
    {
        $videoId = Youtube::parseVidFromURL($request->video);
        if ($this->ingest->videoExists($videoId)) {
            return response()->json(['errors' => ['video' => ['This video already in our Shit']]], 422);
        }

        $this->ingest->ingestVideo($videoId, $request->category['id'] ?? null, $request->subcategories ?? []);

        return response()->json(['message' => 'Video Added Success']);
    }

    public function addVideoQuest(AddVideoRequest $request)
    {
        $videoId = Youtube::parseVidFromURL($request->video);
        if ($this->ingest->videoExists($videoId)) {
            return response()->json(['errors' => ['video' => ['asdsd']]], 422);
        }

        $this->ingest->ingestVideo($videoId, 7, $request->subcategories ?? [], 'inactive');

        return response()->json(['message' => 'Video Added Success']);
    }

    public function updateVideo(UpdateVideoRequest $request)
    {
        $videoId = Youtube::parseVidFromURL($request->video);
        $info = Youtube::getVideoInfo($videoId);

        Video::where('videoId', $videoId)->update(['views' => $info->statistics->viewCount]);

        return response()->json(['message' => 'Video Updated Success']);
    }

    public function deleteVideo($id)
    {
        if (!Auth::user()->isAdmin) {
            return response()->json(['error' => ['you dont have permission for delete this']], 422);
        }

        $video = Video::find($id);
        if (!$video) {
            return response()->json(['error' => ['something went wrong']], 422);
        }

        $video->delete();

        return response()->json(['success' => ['Deleted success']]);
    }

    public function saveCategoryToVideo(SaveCategoryToVideoRequest $request)
    {
        $video = Video::find($request->vid);
        $video->category_id = $request->category;
        $video->save();

        return response()->json(['save' => 'success']);
    }

    public function saveUserCategories(SaveUserCategoriesRequest $request)
    {
        $user = Auth::user();
        $user->categories()->sync($request->categories ?? []);
        $user->step = 2;
        $user->save();

        return response()->json(['success' => 'Saved success']);
    }

    public function details()
    {
        $detail = new Detail;
        $detail->name = Str::random(40);
        $detail->type = Str::random(30);
        $detail->comment = Str::random(20);
        $detail->save();

        $detail->users()->attach([User::find(4)->id]);

        return response('done');
    }
}
