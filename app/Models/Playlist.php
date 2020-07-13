<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function videos()
    {
        return $this->belongsToMany(Video::class, 'playlist_video', 'playlist_id', 'video_id')->withTimestamps();
    }
}
