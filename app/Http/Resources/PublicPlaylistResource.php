<?php

namespace App\Http\Resources;

use App\Models\Playlist;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicPlaylistResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $totalDurationSeconds = (int) ($this->total_duration_seconds ?? 0);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'mode' => $this->mode,
            'country' => $this->country,
            'category' => $this->whenLoaded('category', fn () => $this->category ? [
                'id' => $this->category->id,
                'name' => $this->category->category_name,
            ] : null),
            'video_count' => (int) ($this->videos_count ?? 0),
            'total_views' => (int) ($this->total_views ?? 0),
            'total_duration_seconds' => $totalDurationSeconds,
            'duration_bucket' => $totalDurationSeconds >= Playlist::LONG_DURATION_THRESHOLD_SECONDS ? 'long' : 'quick',
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
