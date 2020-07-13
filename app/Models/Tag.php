<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function videos()
    {
        return $this->belongsToMany(Video::class, 'tag_video', 'tag_id', 'video_id');
    }
}
