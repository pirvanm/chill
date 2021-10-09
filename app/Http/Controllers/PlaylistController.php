<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaylistResource;
use App\Http\Resources\VideoResource;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{

    public function getPlaylist($id)
    {

        // $playlist->videos();

        return 'ceva';


        $playlist = Playlist::where('videoId', $id)->first();

        $videos = Video::whereNotIn('videoId', [$video->videoId])
            //  ->where('category_id', $tipe)
            ->inRandomOrder()
            ->paginate(100);
    }

    public function getPublicPlaylist()
    {
        $top = Playlist::latest()->where('name', 'LIKE', '%top%')->get();
        $playlists = Playlist::latest()->where('mode', 'public')->get();
        $popularPlaylistsByCategory = Playlist::latest()->where('name', 'like', 'top%')->get();
        $quickPlaylists = Playlist::latest()->where('name', 'like', 'quick%')->get();
        $chillHopPlaylists = Playlist::latest()->where('name', 'like', '%hop%')->get();
        $playlistsAmbiental = Playlist::latest()->where('name', 'like', 'amb%')->get();
        $regioanlPlaylists = Playlist::latest()->where('name', 'like', 'regioanal%')->get();

        // return $top;
        return response()->json([
            'playlists' => $playlists,
            'top' => $top
        ]);
        // return PlaylistResource::collection(
        //     // $top,
        //     $playlists,
        //     // $popularPlaylistsByCategory,
        //     // $quickPlaylists,
        //     // $chillHopPlaylists,
        //     // $playlistsAmbiental,
        //     // $regioanlPlaylists,
        // );
    }

    public function createPublicPlaylist(Request $request)
    {
        $playlist = new Playlist;
        $playlist->name = $request->name;
        $playlist->slug = Str::slug($request->name, '-') . '-' . Str::random(5);
        $playlist->mode = 'Public';
        $playlist->save();

        return response()->json('success');
    }

    public function addVideoToPlaylist(Request $request)
    {
        $playlist = Playlist::where('slug', $request->playlist)->first();

        $video = Video::where('videoId', $request->video)->first();

        $playlist->videos()->attach($video->id);

        return response()->json('success');
    }

    public function getPlaylistbySlug($slug)
    {
        $playlist = Playlist::where('slug', $slug)->first();
        $videos = $playlist->videos;
        return VideoResource::collection($videos);
    }
}
