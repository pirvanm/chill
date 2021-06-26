<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideos()
    {
        $videos = Video::latest()->paginate(30);

        return VideoResource::collection($videos);
    }
}
