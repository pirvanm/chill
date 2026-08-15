<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use App\Services\VideoCatalogService;

class VideoCatalogController extends Controller
{
    private VideoCatalogService $catalog;

    public function __construct(VideoCatalogService $catalog)
    {
        $this->catalog = $catalog;
    }

    public function getAllVideos()
    {
        return VideoResource::collection($this->catalog->oneVideoPerCategory());
    }

    public function getStats()
    {
        return response()->json($this->catalog->statsByCategory());
    }

    public function getListHomeVideo()
    {
        return VideoResource::collection($this->catalog->homePageVideos());
    }

    public function getListCategoryVideo()
    {
        return $this->catalog->categoryVideosList();
    }

    public function getVideosJazzy()
    {
        return VideoResource::collection($this->catalog->byCategory(1));
    }

    public function getLatestVideosJazzy()
    {
        return VideoResource::collection($this->catalog->byCategory(1, null, 12));
    }

    public function getLatestVideosRock()
    {
        return VideoResource::collection($this->catalog->byCategory(14, null, 100));
    }

    public function getVideosAmbient()
    {
        return VideoResource::collection($this->catalog->byCategory(2, null, 500));
    }

    public function getVideosAmbientMeditate()
    {
        return VideoResource::collection($this->catalog->byCategory(2, 2, 100));
    }

    public function getLastestVideosAmbient()
    {
        return VideoResource::collection($this->catalog->byCategory(2, null, 12));
    }

    public function getVideosLofi()
    {
        return VideoResource::collection($this->catalog->byCategory(3, null, 500));
    }

    public function getVideosLofiHouse()
    {
        return VideoResource::collection($this->catalog->byCategory(3, 2, 100));
    }

    public function getVideosChillStep()
    {
        return VideoResource::collection($this->catalog->byCategory(5, null, 100));
    }

    public function getLatestChillStep()
    {
        return VideoResource::collection($this->catalog->byCategory(5, null, 500, false));
    }

    public function getVideosChillOut()
    {
        return VideoResource::collection($this->catalog->byCategory(6, null, 500));
    }

    public function getVideosChillOutGaming()
    {
        return VideoResource::collection($this->catalog->byCategory(6, 2, 500));
    }

    public function getLatestChillOut()
    {
        return VideoResource::collection($this->catalog->byCategory(6, null, 500, false));
    }

    public function getLatestVideosLofi()
    {
        return VideoResource::collection($this->catalog->byCategory(4, null, 500, false));
    }

    public function getDown()
    {
        return VideoResource::collection($this->catalog->byCategory(7, null, 500));
    }

    public function getTrap()
    {
        return VideoResource::collection($this->catalog->byCategory(8, null, 500));
    }

    public function getLounge()
    {
        return VideoResource::collection($this->catalog->byCategory(11, null, 500));
    }

    public function getWorld()
    {
        return VideoResource::collection($this->catalog->byCategory(12, null, 500));
    }

    public function getTechno()
    {
        return VideoResource::collection($this->catalog->byCategory(13, null, 500));
    }

    public function getClassical()
    {
        return VideoResource::collection($this->catalog->byCategory(10, null, 500));
    }

    public function getClassic()
    {
        return VideoResource::collection($this->catalog->byCategory(9, null, 500));
    }
}
