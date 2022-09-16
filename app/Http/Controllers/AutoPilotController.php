<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaylistResource;
use App\Http\Resources\VideoResource;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AutoPilotController extends Controller
{

    public function getPlaylistbySlug($slug)
    {
        $playlist = Playlist::where('slug', $slug)->first();
        $videos = $playlist->videos;
        return VideoResource::collection($videos);
    }
}
