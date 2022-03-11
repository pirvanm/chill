<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mode' => $this->mode,
            'name' => $this->name,
            'slug' => $this->slug,
            'cover_style' => $this->cover_style,
            'image' => $this->image,
            'videos' => $this->videos,
        ];
    }
}
