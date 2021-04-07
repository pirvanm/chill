<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewSongNotification;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Video extends Model
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'publishedAt'];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_video', 'tag_id',
            'video_id');
    }

    public function category()
    {
        return $this->belongsto(Category::class);
    }



    // Notification Call For User

    // protected static function boot()
    // {
    //     parent::boot();
    //     self::created(function ($model) {
    //         $model->notify(new NewSongNotification());
    //     });
    // }


    // Notification Hook For User

    public function routeNotificationFor($driver)
    {
        return 'REDACTED_SLACK_WEBHOOK';
    }

    public function subcategories()
    {
        return $this->belongsToMany(Video::class, 'sub_category_video', 'video_id', 'sub_category_id')->withTimestamps();
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_video', 'playlist_id', 'video_id')->withTimestamps();
    }
}
