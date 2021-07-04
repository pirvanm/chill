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
        $duration = $request->duration;
        $minViewRequest = $request->min;
        $maxViewRequest = $request->max;
        $titleRequest = $request->title;
        $videos = Video::latest()
            ->when($category, function ($query, $category) {
                return $query->where('category_id', $category->id);
            })
            ->when($duration, function ($query, $duration) {
                return $query->where('type_duration', $duration);
            })
            ->when($minViewRequest, function ($query, $minViewRequest) {
                return $query->where('views', '>', $minViewRequest);
            })
            ->when($maxViewRequest, function ($query, $maxViewRequest) {
                return $query->where('views', '<', $maxViewRequest);
            })
            ->when($titleRequest, function ($query, $titleRequest) {
                return $query->where('title', 'LIKE', '%' . $titleRequest . '%');
            })
            ->paginate(30);

        if (count($videos->pluck('views')) > 0) {
            $maxView = max($videos->pluck('views')->toArray());
            $minView = min($videos->pluck('views')->toArray());
        } else {
            $minView = 0;
            $maxView = 0;
        }

        return VideoResource::collection($videos)->additional(['imp' => [
            'minView' => $minView,
            'maxView' => $maxView,
        ]]);;
    }

    public function getCategories()
    {
        $categories = Category::latest()->get();

        return CategoryResource::collection($categories);
    }
}
