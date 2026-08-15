<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddVideoToPlaylistRequest;
use App\Http\Requests\CreatePlaylistRequest;
use App\Http\Resources\VideoResource;
use App\Services\PlaylistService;

class PlaylistController extends Controller
{
    private PlaylistService $playlists;

    public function __construct(PlaylistService $playlists)
    {
        $this->playlists = $playlists;
    }

    public function getPublicPlaylist()
    {
        return response()->json($this->playlists->groupedPublicPlaylists());
    }

    public function createPublicPlaylist(CreatePlaylistRequest $request)
    {
        $this->playlists->createPublic($request->name);

        return response()->json('success');
    }

    public function addVideoToPlaylist(AddVideoToPlaylistRequest $request)
    {
        $this->playlists->attachVideo($request->playlist, $request->video);

        return response()->json('success');
    }

    public function getPlaylistbySlug($slug)
    {
        return VideoResource::collection($this->playlists->bySlug($slug));
    }

    public function getPilot()
    {
        return VideoResource::collection($this->playlists->pilot());
    }
}
