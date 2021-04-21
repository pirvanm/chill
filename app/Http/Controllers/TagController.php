<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTagVideos(Request $request)
    {
        $tag = Tag::find($request->id);

        $videos = $tag->videos;

        return response()->json([
            'videos' => $videos,
            'tag' => $tag
        ]);
    }
}
