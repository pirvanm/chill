<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'videoId' => $this->videoId,
            'thumbnail' => $this->thumbnail,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'published_at' => $this->publishedAt->diffForHumans(),
            'created_at' => $this->created_at->format('d M Y'),
            'channel' =>
                new ChannelForVideoResource($this->channel),
        ];
    }
}
