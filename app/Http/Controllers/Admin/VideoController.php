<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\VideoResource;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideos(Request $request)
    {
        $category = Category::where('category_name', $request->category)->first();
        $videos = Video::latest()->when($category, function ($query, $category) {
            return $query->where('category_id', $category->id);
        })->paginate(30);

        return VideoResource::collection($videos);
    }

    public function getCategories()
    {
        $categories = Category::latest()->get();

        return CategoryResource::collection($categories);
    }
}
