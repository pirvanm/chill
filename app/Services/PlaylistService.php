<?php

namespace App\Services;

use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class PlaylistService
{
    public function filter(array $filters): LengthAwarePaginator
    {
        $query = Playlist::query()
            ->withAggregates()
            ->where('mode', 'public')
            ->with('category');

        if (!empty($filters['category_id'])) {
            $query->where('playlists.category_id', $filters['category_id']);
        }

        if (!empty($filters['country'])) {
            $query->where('playlists.country', $filters['country']);
        }

        if (!empty($filters['duration'])) {
            $query->having(
                'total_duration_seconds',
                $filters['duration'] === 'quick' ? '<' : '>=',
                Playlist::LONG_DURATION_THRESHOLD_SECONDS
            );
        }

        switch ($filters['sort'] ?? 'popularity') {
            case 'newest':
                $query->orderByDesc('playlists.created_at');
                break;
            case 'name':
                $query->orderBy('playlists.name');
                break;
            case 'popularity':
            default:
                $query->orderByDesc('total_views');
                break;
        }

        return $query->paginate($filters['per_page'] ?? 20);
    }

    public function createPublic(string $name): Playlist
    {
        $playlist = new Playlist;
        $playlist->name = $name;
        $playlist->slug = Str::slug($name, '-') . '-' . Str::random(5);
        $playlist->mode = 'public';
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
