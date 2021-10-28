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


        // $playlist = Playlist::where('videoId', $id)->first();

        // $videos = Video::whereNotIn('videoId', [$video->videoId])
        //     //  ->where('category_id', $tipe)
        //     ->inRandomOrder()
        //     ->paginate(100);
    }

    public function getPublicPlaylist()
    {
      
        //top 
        $top = Playlist::latest()->where('name', 'LIKE', '%top%')->get();

        //duration 
        $quick = Playlist::latest()->where('name', 'LIKE', '%quick%')->get();
        $everage =Playlist::latest()->where('name', 'LIKE', '%quick%')->get();
        $long = Playlist::latest()->where('name', 'LIKE', '%long%')->get();
        
        //category 
        $meditat = Playlist::latest()->where('name', 'LIKE', '%meditat%')->get();
        $downtempo = Playlist::latest()->where('name', 'LIKE', '%downtempo%')->get();
        $ambiental = Playlist::latest()->where('name', 'LIKE', '%ambiental%')->get();
        $rock = Playlist::latest()->where('name', 'LIKE', '%rock%')->get();
        $chill = Playlist::latest()->where('name', 'LIKE', '%chill%')->get();
        $gaming = Playlist::latest()->where('name', 'LIKE', '%gaming%')->get();
        $classic = Playlist::latest()->where('name', 'LIKE', '%classic%')->get();
        $techno = Playlist::latest()->where('name', 'LIKE', '%techno%')->get();
        $trap = Playlist::latest()->where('name', 'LIKE', '%trap%')->get();
      
        $lo_fi = Playlist::latest()->where('name', 'LIKE', '%lo-fi%')->get();
        $hiphop = Playlist::latest()->where('name', 'LIKE', '%hip-hop%')->get();
        // regioanal

        $arabic = Playlist::latest()->where('name', 'LIKE', '%arabic%')->get();
        $african = Playlist::latest()->where('name', 'LIKE', '%african%')->get();
        $china = Playlist::latest()->where('name', 'LIKE', '%china%')->get();
        $chinese = Playlist::latest()->where('name', 'LIKE', '%chinese%')->get();
        $france = Playlist::latest()->where('name', 'LIKE', '%france%')->get();
        $indian = Playlist::latest()->where('name', 'LIKE', '%indian%')->get();
        $italy = Playlist::latest()->where('name', 'LIKE', '%italy%')->get();
        $spania = Playlist::latest()->where('name', 'LIKE', '%Spania%')->get();
        $spanish = Playlist::latest()->where('name', 'LIKE', '%spanish%')->get();
        $japan = Playlist::latest()->where('name', 'LIKE', '%japan%')->get();
       

        // all playlist 
        $playlists = Playlist::latest()->where('mode', 'public')->get();

        return response()->json([
            'playlists' => $playlists,
            'top' => $top,
            'rock' => $rock,
            'chill' => $chill,
            'long' => $long,
            'quick' => $quick,
            'meditat' => $meditat,
            'downtempo' => $downtempo,
            'all' => $all,
            'ambiental' => $ambiental,
            'gaming' => $gaming,
            'classic' => $classic,
            'lo_fi' => $lo_fi,
            'hiphop' => $hiphop,
            'african' => $african,
            'spania' => $spania,
            'china' => $china,
            'arabic' => $arabic,
            'chinese' => $chinese,
            'france' => $france,
            'indian' => $indian,
            'italy' => $italy,
            'spanish' => $spanish,
            'japan' => $japan,
            'techno' => $techno,
            'trap' => $trap,
        ]);
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
