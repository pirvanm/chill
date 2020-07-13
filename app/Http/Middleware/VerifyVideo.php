<?php

namespace App\Http\Middleware;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Video;
use Closure;

class VerifyVideo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $video = Video::where('video-id', $request->route()->parameters())->first();

        if(!$video){
            $youtube = Youtube::getVideoInfo($request->route()->parameters());

            $vid = new Video;
            $vid->videoId = $youtube;
        }
        return $next($request);
    }
}
