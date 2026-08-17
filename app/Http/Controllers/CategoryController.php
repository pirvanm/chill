<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\VideoResource;
use Illuminate\Routing\Controller;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function getCategories()
    {
      
        $categories = Category::latest()
        ->orderBy('category_name', 'desc')->get();

        return CategoryResource::collection($categories);
        return response()->json(['categories' => $categories]);
    }

    public function postCategory(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->name;
        $category->save();

        return response()->json(['category' => $category]);
    }

    public function currentCategoriesWithName($name)
    {
        $category = Category::where('category_name', $name)->first();
        $videos = Video::where('category_id', $category->id)->paginate(18);
        return VideoResource::collection($videos);
        return new CategoryResource($category);
    }

    public function currentCategories($id)
    {

        /*
        SELECT c.category_name FROM videos v
        INNER JOIN category c ON v.id = c.id
        WHERE v.videoId = 'ssS_5ol3t7U';
        */


        $category = \DB::table('videos')
            ->join('category', 'category.id', '=', 'videos.category_id')

            ->select('category.category_name')
            ->where('videoId', '=', $id)
            ->get();



        return new CategoryResource($category);

        //  return response()->json(['category' => $category]);
        // return $category;

        /*   $category = Video::find(1)->category;

        dd($category);*/
    }
}
