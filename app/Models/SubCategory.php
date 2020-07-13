<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'sub_category_video', 'video_id', 'sub_category_id');
    }
}
