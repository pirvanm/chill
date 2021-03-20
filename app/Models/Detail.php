<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /**
     * The users that belong to the Detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() //: BelongsToMany
    {
        return $this->belongsToMany(User::class, 'detail_user', 'detail_id', 'user_id')->withTimestamps();
    }
}
