<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchVideo(Request $request)
    {
        $videos = Video::where('title', 'LIKE', '%' . $request->text . '%')->get();

        return response()->json(['videos' => $videos]);
    }
}
