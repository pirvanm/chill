<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    protected $table = 'category';
    public function video()
    {
        return $this->belongsTo('App\Models\Video');
    }


    /**
     * Get all of the videos for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class, 'category_id', 'id');
    }


    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    /**
     * The users that belong to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'category_users', 'category_id', 'user_id')->withTimestamps();
    }
}
