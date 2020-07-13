<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';
    public function video()
    {
        return $this->belongsTo('App\Models\Video');
    }


    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
