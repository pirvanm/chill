<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = ['name', 'slug', 'mode', 'user_id', 'category_id', 'country'];

    /** Total duration (seconds) at or above this is bucketed "long", below it "quick". */
    public const LONG_DURATION_THRESHOLD_SECONDS = 3600;

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'playlist_video', 'playlist_id', 'video_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Adds total_views / total_duration_seconds as computed columns via correlated
     * subqueries, since duration is stored per-video as an "H:M:S" string, not seconds.
     */
    public function scopeWithAggregates(Builder $query): Builder
    {
        return $query
            ->select('playlists.*')
            ->addSelect([
                'total_views' => Video::query()
                    ->selectRaw('COALESCE(SUM(videos.views), 0)')
                    ->join('playlist_video', 'playlist_video.video_id', '=', 'videos.id')
                    ->whereColumn('playlist_video.playlist_id', 'playlists.id'),
                'total_duration_seconds' => Video::query()
                    ->selectRaw('COALESCE(SUM(TIME_TO_SEC(videos.duration)), 0)')
                    ->join('playlist_video', 'playlist_video.video_id', '=', 'videos.id')
                    ->whereColumn('playlist_video.playlist_id', 'playlists.id'),
            ])
            ->withCount('videos');
    }
}
