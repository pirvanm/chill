<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function videos()
    {
        return $this->hasMany(Video::class, 'channel_id', 'id');
    }
}
