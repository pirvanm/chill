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
<<<<<<< HEAD
            'channel' =>
                new ChannelForVideoResource($this->channel),
=======
            'channel' => new ChannelForVideoResource($this->channel),
            'tags' => TagResource::collection($this->tags),
            'category' => $this->category,
            'subcategories' => $this->subcategories
>>>>>>> 4b5b67968ed277f11485cf071d2a201eb92e2557
        ];
    }
}
