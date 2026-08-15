<?php

namespace App\Services;

use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Support\Str;

class PlaylistService
{
    /** Keys map 1:1 to the group names the frontend already reads from /api/playlists. */
    private const KEYWORD_GROUPS = [
        'top' => 'top',
        'quick' => 'quick',
        'long' => 'long',
        'meditat' => 'meditat',
        'downtempo' => 'downtempo',
        'ambiental' => 'ambiental',
        'rock' => 'rock',
        'chill' => 'chill',
        'gaming' => 'gaming',
        'classic' => 'classic',
        'techno' => 'techno',
        'trap' => 'trap',
        'lo_fi' => 'lo-fi',
        'hiphop' => 'hip-hop',
        'arabic' => 'arabic',
        'african' => 'african',
        'china' => 'china',
        'chinese' => 'chinese',
        'france' => 'france',
        'indian' => 'indian',
        'italy' => 'italy',
        'spania' => 'Spania',
        'spanish' => 'spanish',
        'japan' => 'japan',
    ];

    public function groupedPublicPlaylists(): array
    {
        $groups = ['all' => Playlist::latest()->get()];

        foreach (self::KEYWORD_GROUPS as $key => $keyword) {
            $groups[$key] = Playlist::latest()->where('name', 'LIKE', "%{$keyword}%")->get();
        }

        $groups['playlists'] = Playlist::latest()->where('mode', 'public')->get();

        return $groups;
    }

    public function createPublic(string $name): Playlist
    {
        $playlist = new Playlist;
        $playlist->name = $name;
        $playlist->slug = Str::slug($name, '-') . '-' . Str::random(5);
        $playlist->mode = 'Public';
        $playlist->save();

        return $playlist;
    }

    public function attachVideo(string $playlistSlug, string $videoId): void
    {
        $playlist = Playlist::where('slug', $playlistSlug)->first();
        $video = Video::where('videoId', $videoId)->first();

        $playlist->videos()->attach($video->id);
    }

    public function bySlug(string $slug)
    {
        $playlist = Playlist::where('slug', $slug)->first();

        return $playlist->videos;
    }

    public function pilot()
    {
        $playlist = Playlist::where('id', 1)->first();

        return $playlist->videos;
    }
}
