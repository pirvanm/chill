<?php

namespace App\Http\Controllers;

//librarie externa folosita dupa github.com
use Alaouy\Youtube\Facades\Youtube;
//use App\Http\Controllers\Traits\ConditionalWatch;
// librarie din laravel
use Illuminate\Support\Str;
//Clase din laravel
use App\Http\Resources\VideoResource;
//Modele care sunt mutate in folderul
// models ,definit de nou
use App\Models\Category;
use App\Models\Channel;
use App\Models\Detail;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video as Video;
use Auth;
//o clasa externa pentru "prelucrarea" datelor
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class VideoController extends Controller
{

    // use ConditionalWatch;


    public function filterVideos()
    {
        //        #1 Chouse a category
        #2 Pick a type of duration
        #3 Pick a tagg
        #4 Pick a interval of views (show all videos which have ,from 1000 untill 10.000 views
        // for example
        #5


        $tag = 'fromvue';
        $duratin = 'on of 1|2|3|4|5';
        $number = "numberofview";
        $filterdVideo =
            Video::where('category_id', 1)
            ->where('duration', $duratin)
            ->where('tags', $tag)
            ->where('view', $number)
            ->get();

        return $filterdVideo;
    }

    public function getStats()
    {

        $videos = Video::all();
        $cat0 =    $videos;

        //        Categories
        $cat1 = $videos->where('category_id', 1);
        $cat2 = $videos->where('category_id', 2);
        $cat3 = $videos->where('category_id', 3);
        $cat4 = $videos->where('category_id', 4);
        $cat5 = $videos->where('category_id', 5);
        $cat6 = $videos->where('category_id', 6);
        $cat7 = $videos->where('category_id', 7);
        $cat8 = $videos->where('category_id', 8);
        $cat9 = $videos->where('category_id', 9);
        $cat10 = $videos->where('category_id', 10);
        $cat11 = $videos->where('category_id', 11);
        $cat12 = $videos->where('category_id', 12);
        $cat13 = $videos->where('category_id', 13);
        $cat14 = $videos->where('category_id', 14);
        //        SubCategory
        return [
            'count0' => count($cat0),
            'count1' => count($cat1),
            'count2' => count($cat2),
            'count3' => count($cat3),
            'count4' => count($cat4),
            'count5' => count($cat5),
            'count6' => count($cat6),
            'count7' => count($cat7),
            'count8' => count($cat8),
            'count9' => count($cat9),
            'count10' => count($cat10),
            'count11' => count($cat11),
            'count12' => count($cat12),
            'count13' => count($cat13),
            'count14' => count($cat14),
        ];
    }
    public function details()
    {
        $detail = new Detail;
        $detail->name = Str::random(40);
        $detail->type = Str::random(30);
        $detail->comment = Str::random(20);
        $detail->save();

        $user = User::find(4); //Find any user for attach

        $detail->users()->attach([$user->id]); // its in array you can add multiple id's

        //$user->details()->attach([$detail->id]); // you can attach reverse like this


        return response('done');
    }

    public function videoTest()
    {

        $videoList = Youtube::getPopularVideos('fr');


        // Search playlists, channels and videos. return an array of PHP objects
        $results = Youtube::search('Android');

        return $videoList;
        $time = date('H');

        if ($time > 19) {
            return 'nigth';
        }

        if ($time > 7) {
            return 'morning';
        }

        if ($time > 12) {
            return 'after noon';
        }
        return date(' H');
    }

    public function getV()
    {

        $vid = 'https://www.youtube.com/watch?v=YOAW4VhlXYA';


        $videoId = Youtube::parseVidFromURL($vid);


        $video = Video::where('videoId', $videoId)->first();

        $video = Youtube::getVideoInfo($videoId);

        //  dd($video);

    }


    public function searchVideo()
    {
        // Same params as before
        $params = [
            'q' => 'Eminem',
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 50
        ];


        // Get popular videos in a country, return an array of PHP objects
        $videoList = Youtube::getPopularVideos('us');

        return $videoList;

        // An array to store page tokens so we can go back and forth
        $pageTokens = [];

        // Make inital search
        $search = Youtube::paginateResults($params, null);

        // Store token
        $pageTokens[] = $search['info']['nextPageToken'];

        //  dd($pageTokens);

        // Go to next page in result
        $search = Youtube::paginateResults($params, $pageTokens[0]);

        // Store token
        $pageTokens[] = $search['info']['nextPageToken'];

        // Go to next page in result
        $search = Youtube::paginateResults($params, $pageTokens[3]);

        dd($search);

        // Store token
        $pageTokens[] = $search['info']['nextPageToken'];

        // Go back a page
        $search = Youtube::paginateResults($params, $pageTokens[0]);

        // Add results key with info parameter set
        print_r($search['results']);
    }

    public function getVideoOfChannels()
    {
        // Take 50 video of channel
        $videoList = Youtube::listChannelVideos('UCk1SpWNzOs4MYmr0uICEntg', 50);

        /* Next Page*/


        $params = [
            'q' => 'Android',
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 50
        ];


        // Make inital search
        $search = Youtube::paginateResults($params, null);


        // Store token
        $pageTokens[] = $search['info']['nextPageToken'];

        // Go to next page in result
        $search = Youtube::paginateResults($params, $pageTokens[0]);


        $paginate = Youtube::paginateResults('UCk1SpWNzOs4MYmr0uICEntg', $pageTokens[0]);
        $paginate = Youtube::paginateResults('UCk1SpWNzOs4MYmr0uICEntg', $pageTokens[0]);

        dd($paginate);


        /* Result */
        dd($videoList);
    }

    public function updateVideo(Request $request)
    {

        $videoId = Youtube::parseVidFromURL($request->video);
        $video = Video::where('videoId', $videoId)->first();

        $cat = $request->category;

        $video = Youtube::getVideoInfo($videoId);

        //   $channel = Channel::where('channelId', $video->snippet->channelId)->first();


        /* If don't have channel */

        $v = new Video();

        $v->views = $video->statistics->viewCount;

        /* Insert a new video in Db */
        $v = Video::where('videoId', $videoId)
            ->update(['views' => $v->views]);
        // $v->videoId = $videoId;
        // $v->title = $video->snippet->title;
        // $v->views = $video->statistics->viewCount ;
        //$v->duration = $video->contentDetails->duration;
        // $v->description = $video->snippet->description;
        // dd($video);
        //  $v->thumbnail = $video->snippet->thumbnails->medium->url;
        //  $videoDate = date('Y-m-d h:i:s', strtotime($video->snippet->publishedAt));
        //  $v->publishedAt = $videoDate;
        //  $v->channel_id = $channel->id;
        //$v->category_id = 7;

        /* Save Duration of Video*/

        /* Save Category of Video*/

        /* Check in Title*/

        // $checkTitle = $chan->snippet->title;

        //   $v->save();


        $subcategories = $request->subcategories;


        /*        foreach ($subcategories as $index => $subcategory) {
                    $v->subcategories()->attach($subcategory['id']);
                }*/

        return response()->json(['message' => 'Video Updated Success']);
    }

    public function addVideo(Request $request)
    {

        $videoId = Youtube::parseVidFromURL($request->video);
        $video = Video::where('videoId', $videoId)->first();
        $videoId = Youtube::parseVidFromURL($request->video);

        //  $cat = $request->category;


        /* Validation if Video Exists*/
        if ($video) {
            /* Validation if a video exist */
            return response()->json(['errors' => [
                'video' => [
                    'This video already in our Shit'
                ]
            ]], 422);
        }
        $video = Youtube::getVideoInfo($videoId);

        $channel = Channel::where('channelId', $video->snippet->channelId)->first();

        /* If don't have channel */
        if (!$channel) {
            $chan = Youtube::getChannelById($video->snippet->channelId);
            $channel = new Channel;
            $channel->channelId = $video->snippet->channelId;
            $channel->title = $chan->snippet->title;
            $channel->description = $chan->snippet->description;
            // $channel->customurl = $chan->snippet->customUrl;
            $channelDate = date('Y-m-d h:i:s', strtotime($chan->snippet->publishedAt));
            $channel->publishedAt = $channelDate;
            $channel->thumbnail = $chan->snippet->thumbnails->medium->url;
            $channel->save();
        }

        $yduration = $video->contentDetails->duration;
        if ($yduration) {
            preg_match_all('/(\d+)/', $yduration, $parts);

            // Put in zeros if we have less than 3 numbers.
            if (count($parts[0]) == 1) {
                array_unshift($parts[0], "0", "0");
            } elseif (count($parts[0]) == 2) {
                array_unshift($parts[0], "0");
            }

            $sec_init = $parts[0][2];
            $seconds = $sec_init % 60;
            $seconds_overflow = floor($sec_init / 60);

            $min_init = $parts[0][1] + $seconds_overflow;
            $minutes = ($min_init) % 60;
            $minutes_overflow = floor(($min_init) / 60);

            $hours = $parts[0][0] + $minutes_overflow;

            if ($hours != 0)
                $duration = $hours . ':' . $minutes . ':' . $seconds;
            else
                $duration = '00' . ':'  . $minutes . ':' . $seconds;
        } else {
            $duration = '00:00:00';
        }

        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $duration);

        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

        $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;

        $durationType = 0;

        if ($time_seconds < 360) {
            $durationType = 1;
        }

        if ($time_seconds > 360 && $time_seconds < 900) {
            $durationType = 2;
        }

        if ($time_seconds > 900 && $time_seconds < 3000) {
            $durationType = 3;
        }

        if ($time_seconds > 3000 && $time_seconds < 7200) {
            $durationType = 4;
        }

        if ($time_seconds > 7200) {
            $durationType = 5;
        }

        /* Insert a new video in Db */
        $v = new Video;
        $v->videoId = $videoId;
        $v->title = $video->snippet->title;
        $v->views = $video->statistics->viewCount;
        $v->duration = $duration;
        //  $v->duration = 99999999;
        $v->description = $video->snippet->description;
        // dd($video);
        $v->thumbnail = $video->snippet->thumbnails->medium->url;
        $videoDate = date('Y-m-d h:i:s', strtotime($video->snippet->publishedAt));
        $v->publishedAt = $videoDate;
        $v->channel_id = $channel->id;
        $v->category_id = $request->category['id'] ? $request->category['id'] : '';
        $v->type_duration = $durationType;
        //  $v->subcategories =2;

        /* Save Duration of Video*/

        /* Save Category of Video*/

        /* Check in Title*/

        // $checkTitle = $chan->snippet->title;

        $v->save();

        if (isset($video->snippet->tags)) {
            foreach ($video->snippet->tags as $tag) {
                $t = Tag::where('name', $tag)->first();
                if (!$t) {
                    $t = new Tag;
                    $t->name = $tag;
                    $t->save();
                }

                $t->videos()->attach($v->id);
            }
        }

        $subcategories = $request->subcategories;


        foreach ($subcategories as  $subcategory) {
            $v->subcategories()->attach($subcategory['id']);
        }

        return response()->json(['message' => 'Video Added Success']);
    }

    public function addVideoQuest(Request $request)
    {

        // dd('stop');

        $videoId = Youtube::parseVidFromURL($request->video);
        $video = Video::where('videoId', $videoId)->first();
        $videoId = Youtube::parseVidFromURL($request->video);

        //  $cat = $request->category;


        /* Validation if Video Exists*/
        if ($video) {
            /* Validation if a video exist */
            return response()->json(['errors' => [
                'video' => [
                    'asdsd'
                ]
            ]], 422);
        }
        $video = Youtube::getVideoInfo($videoId);

        $channel = Channel::where('channelId', $video->snippet->channelId)->first();

        /* If don't have channel */
        if (!$channel) {
            $chan = Youtube::getChannelById($video->snippet->channelId);
            $channel = new Channel;
            $channel->channelId = $video->snippet->channelId;
            $channel->title = $chan->snippet->title;
            $channel->description = $chan->snippet->description;
            // $channel->customurl = $chan->snippet->customUrl;
            $channelDate = date('Y-m-d h:i:s', strtotime($chan->snippet->publishedAt));
            $channel->publishedAt = $channelDate;
            $channel->thumbnail = $chan->snippet->thumbnails->medium->url;
            $channel->save();
        }

        /* Insert a new video in Db */
        $v = new Video;
        $v->videoId = $videoId;
        $v->title = $video->snippet->title;
        $v->views = $video->statistics->viewCount;
        //$v->duration = $video->contentDetails->duration;
        $v->description = $video->snippet->description;
        // dd($video);
        $v->thumbnail = $video->snippet->thumbnails->medium->url;
        $videoDate = date('Y-m-d h:i:s', strtotime($video->snippet->publishedAt));
        $v->publishedAt = $videoDate;
        $v->channel_id = $channel->id;
        $v->category_id = 7;
        $v->status = 'inactive';
        //  $v->subcategories =2;

        /* Save Duration of Video*/

        /* Save Category of Video*/

        /* Check in Title*/

        // $checkTitle = $chan->snippet->title;

        $v->save();

        if (isset($video->snippet->tags)) {
            foreach ($video->snippet->tags as $tag) {
                $t = Tag::where('name', $tag)->first();
                if (!$t) {
                    $t = new Tag;
                    $t->name = $tag;
                    $t->save();
                }

                $t->videos()->attach($v->id);
            }
        }

        $subcategories = $request->subcategories;


        foreach ($subcategories as $index => $subcategory) {
            $v->subcategories()->attach($subcategory['id']);
        }

        return response()->json(['message' => 'Video Added Success']);
    }





    public function getAllVideos()
    {
        $categories = Category::get();
        foreach ($categories as  $category) {

            $v[] = Video::where('category_id', $category->id)->first();
        }
        $videos = collect($v);
        // $videos = Video::latest()
        //     ->where('status', 'inactive')
        //     ->paginate(12);

        return VideoResource::collection($videos);
    }

    public function getVideosJazzy()
    {
        // latest() metoda i-a ultimele rezultate in ordine
        //descendenta

        //similar cu limit din mysql
        $videos = Video::latest()
            //i-amti toate videclipturile unde categoria
            // este egala cu 1
            ->where('category_id', '1')
            //paginate () asemanator cu get doar ca
            // spunem cate rezultate sa ia
            ->paginate(500);

        return VideoResource::collection($videos);
    }

    //    public function getLatestVideos() {
    //        $videos = Video::latest()
    //            ->where('category_id','1')
    //            ->paginate(50);
    //        return VideoResource::collection($videos);
    //
    //    }


    public function getLatestVideosJazzy()
    {
        $videos = Video::latest()->where('category_id', 1)->paginate(12);
        return VideoResource::collection($videos);
    }

    public function getLatestVideosRock()
    {
        $videos = Video::latest()
            ->where('category_id', 14)
            //->where('subcategory_id', 2)
            ->paginate(100);
        return VideoResource::collection($videos);
    }


    public function getVideosAmbient()
    {

        $videos = Video::latest()
            ->where('category_id', '2')
            ->paginate(500);
        return VideoResource::collection($videos);
    }

    public function getVideosAmbientMeditate()
    {
        $videos = Video::latest()
            ->where('category_id', 2)
            ->where('subcategory_id', 2)
            ->paginate(100);
        return VideoResource::collection($videos);
    }


    public function getLastestVideosAmbient()
    {

        $videos = Video::latest()->where('category_id', 2)->paginate(12);
        return VideoResource::collection($videos);
    }


    public function getVideosLofi()
    {
        $videos = Video::latest()
            ->where('category_id', '3')
            ->paginate(500);

        // $videos = Video::latest()->paginate(12);


        return VideoResource::collection($videos);
    }

    public function getVideosLofiHouse()
    {
        $videos = Video::latest()
            ->where('category_id', 3)
            ->where('subcategory_id', 2)
            ->paginate(100);

        // $videos = Video::latest()->paginate(12);


        return VideoResource::collection($videos);
    }


    public function getVideosChillStep()
    {
        $videos = Video::latest()->where('category_id', '5')->paginate(100);

        // $videos = Video::latest()->paginate(12);


        return VideoResource::collection($videos);
    }


    public function getVideosChillOut()
    {
        $videos = Video::latest()->where('category_id', '6')->paginate(500);

        // $videos = Video::latest()->paginate(12);


        return VideoResource::collection($videos);
    }


    public function getVideosChillOutGaming()
    {
        $videos = Video::latest()
            ->where('category_id', 6)
            ->where('subcategory_id', 2)
            ->paginate(500);
        return VideoResource::collection($videos);
    }


    public function getLatestVideosLofi()
    {
        $videos = Video::where('category_id', 4)->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getLatestChillStep()
    {
        $videos = Video::where('category_id', 5)->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getLatestChillOut()
    {
        $videos = Video::where('category_id', 6)->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getVideosRegional()
    {
        $videos = Video::latest()->where('category_id', '4')->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getVideosRegionalFrance()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('subcategory_id', 2)
            ->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getVideosRegionalItaly()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('subcategory_id', 3)
            ->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getVideosRegionalArabic()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('subcategory_id', 4)
            ->paginate(500);

        return VideoResource::collection($videos);
    }

    public function getVideosRegionalSpanish()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('subcategory_id', 5)
            ->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getVideosRegionalIndian()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('status', 'active')
            ->where('subcategory_id', 6)
            ->paginate(500);

        return VideoResource::collection($videos);
    }

    public function getVideosRegionalChinese()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('subcategory_id', 7)
            ->paginate(500);

        return VideoResource::collection($videos);
    }

    public function getVideosRegionalJapan()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('subcategory_id', 8)
            ->where('status', 'active')
            ->paginate(500);

        return VideoResource::collection($videos);
    }

    public function getVideoRegionalAfrican()
    {
        $videos = Video::latest()->where('category_id', 4)
            ->where('subcategory_id', 9)
            ->where('status', 'active')
            ->paginate(100);

        return VideoResource::collection($videos);
    }


    public function getClassical()
    {
        $videos = Video::latest()->where('category_id', '10')->paginate(500);

        return VideoResource::collection($videos);
    }

    public function getClassic()
    {
        $videos = Video::latest()->where('category_id', '9')->paginate(500);

        return VideoResource::collection($videos);
    }


    public function getVideoChillHop($id)
    {
        $video = Video::where('videoId', $id)->first();
        $videos = Video::whereNotIn('videoId', [$video->videoId])
            ->where('category_id', '1')
            ->paginate(30);
        return response()->json(['video' => $video, 'videos' => $videos]);
    }

    public function getDown()
    {
        $videos = Video::latest()->where('category_id', '7')->paginate(500);
        return VideoResource::collection($videos);
    }

    public function getTrap()
    {
        $videos = Video::latest()->where('category_id', '8')->paginate(500);
        return VideoResource::collection($videos);
    }



    public function getLounge()
    {
        $videos = Video::latest()->where('category_id', '11')->paginate(500);
        return VideoResource::collection($videos);
    }


    public function getWorld()
    {
        $videos = Video::latest()->where('category_id', '12')->paginate(500);
        return VideoResource::collection($videos);
    }


    public function getTechno()
    {
        $videos = Video::latest()->where('category_id', '13')->paginate(500);
        return VideoResource::collection($videos);
    }

    public function getVideofff($id = 222)
    {
        return me;
    }

    public function getCat(Request $request)
    {

        dd($request->json());
    }

    public function getVideo($id)
    {

        //  $request =new  Request;

        //   $request->input('id');

        //   dd($request);
        // dd('die');

        // return response($request);
        //  $request = new RequestInfo;
        // return $request;
        //   $path = $request->path();

        //   $id = Str::afterLast($path,'/')

        /*   if ($id == 'lTRiuFIWV54') {
            $videos = Video::whereNotIn('videoId', [$video->videoId])
                ->where('category_id', 13)
                ->inRandomOrder()
                ->paginate(100);
        } else*/


        //   $tipe = $this->musicTime();
        $tipe = 1;
        $video = Video::where('videoId', $id)->firstorfail();

        if ($video->category) {
            $videos = Video::where('category_id', $video->category->id)->whereNotIn('videoId', [$video->videoId])
                //  ->where('category_id', $tipe)
                ->inRandomOrder()
                ->paginate(100);
            // $videos = Video::whereHas('category', function ($query) use ($video) {
            //     $query->where('id', $video->category->id);
            // })
        } else {
            $videos = Video::whereNotIn('videoId', [$video->videoId])
                //  ->where('category_id', $tipe)
                ->inRandomOrder()
                ->paginate(100);
        }


        // $videos = Video::whereNotIn('videoId', [$video->videoId])
        //   //  ->where('category_id', $tipe)
        //     ->inRandomOrder()
        //     ->paginate(100);

        //>latest();


        //$video = Video::where('videoId', $id)->first();


        /* Random Vigdep*/
        //   $videos = Video::whereNotIn('videoId', [$video->videoId])->latest()->paginate(30);


        /* First  Paginate Number */
        //   $videos = Video::whereNotIn('videoId', [$video->videoId])->paginate(30);

        /* Latest 30 video of Collection*/

        // $videos = Video::whereNotIn('videoId', [$video->videoId])->paginate(30);


        //  $videos = Video::whereNotIn('videoId', [$video->videoId])->la->paginate(4);

        /* BUgg this will repat , no move forward*/
        //$videos = Video::whereNotIn('videoId', [$video->videoId])->orderBy('id','DESC')->paginate(30);

        /* Latest Chill Hop*/
        //$videos = Video::whereNotIn('videoId', [$video->videoId])->where('category_id','1')->orderBy('id', 'DESC')->paginate(30);

        $categories = Category::get();

        return response()->json(['video' => new VideoResource($video), 'videos' => VideoResource::collection($videos), 'categories' => $categories]);
    }


    public function store(Request $request)
    {
        // Validate the request...

        //        $video = new Video();
        //
        //        $video->title = 'video 200';
        //        $video->videolink = 'lalala ';
        //        $video->videoId = 'lalala ';
        //        $video->channel_id = '12323';
        //        $video->uuid = '21321';
        //
        //        $video->save();
        //
        //
        //        $video = new Video();
        //
        //        $video->title = 'video 200';
        //        $video->videolink = 'lalala ';
        //        $video->videoId = 'lalala ';
        //        $video->channel_id = '12323';
        //        $video->uuid = '21321';
        //
        //        $video->save();


        //        $video = new Video();
        //
        //        $video->title = 'video 2';
        //        $video->videolink = 'link2 ';
        //        $video->videoId = 'id3 ';
        //        $video->channel_id = '2';
        //        $video->uuid = '2';
        //
        //        $video->save();


        //
        //        $video = new Video();
        //
        //        $video->title = 'video 3';
        //        $video->videolink = 'link3 ';
        //        $video->videoId = 'id3 ';
        //        $video->channel_id = '3';
        //        $video->uuid = '3';
        //
        //        $video->save();


        $video = new Video();

        $video->title = 'video 5';
        // $video->videolink = 'link 4 ';
        $video->videoId = 'id 5 ';
        $video->channel_id = '5';
        // $video->uuid = '4';
        $video->description = 'desc 5';
        $video->thumbnail = 'ttt55';
        $video->publishedAt = '5';
        $video->save();
        //
        //
        //        $video = new Video();
        //
        //        $video->title = 'video 5';
        //        $video->videolink = 'link5 ';
        //        $video->videoId = 'id5 ';
        //        $video->channel_id = '5';
        //        $video->uuid = '5';
        //
        //        $video->save();
        //
        //
        //
        //        $video = new Video();
        //
        //        $video->title = 'video 200';
        //        $video->videolink = 'lalala ';
        //        $video->videoId = 'lalala ';
        //        $video->channel_id = '12323';
        //        $video->uuid = '21321';
        //
        //        $video->save();
    }

    public function deleteVideo($id)
    {
        $user = Auth::user();
        if ($user->isAdmin) {
            $video = Video::find($id);
            if ($video) {
                $video->delete();
                return response()->json(
                    [
                        'success' => [
                            'Deleted success'
                        ]
                    ]
                );
            } else {
                return response()->json([
                    'error' => [
                        'something went wrong'
                    ]
                ], 422);
            }
        } else {
            return response()->json([
                'error' => [
                    'you dont have permission for delete this'
                ]
            ], 422);
        }
    }

    public function saveCategoryToVideo(Request $request)
    {
        $video = Video::find($request->vid);
        $video->category_id = $request->category;
        $video->save();

        return response()->json([
            'save' => 'success'
        ]);
    }
}
