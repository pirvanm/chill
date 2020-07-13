<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function postSubCategory(Request $request)
    {
        $subcategory = new SubCategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category['id'];
        $subcategory->save();

        return response()->json(['message' => 'Sub Category Added Success', 'subcategory' => $subcategory]);
    }

    public function getSubCategoryWithCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $subcategories = SubCategory::where('category_id', $category->id)->get();

        return response()->json(['subcategories' => $subcategories]);
    }
}
