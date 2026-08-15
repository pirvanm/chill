<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use App\Services\VideoCatalogService;

class VideoRegionalController extends Controller
{
    private VideoCatalogService $catalog;

    public function __construct(VideoCatalogService $catalog)
    {
        $this->catalog = $catalog;
    }

    public function getVideosRegional()
    {
        return VideoResource::collection($this->catalog->byCategory(4, null, 500));
    }

    public function getVideosRegionalFrance()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 2, 500));
    }

    public function getVideosRegionalItaly()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 3, 500));
    }

    public function getVideosRegionalArabic()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 4, 500));
    }

    public function getVideosRegionalSpanish()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 5, 500));
    }

    public function getVideosRegionalIndian()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 6, 500, true, 'active'));
    }

    public function getVideosRegionalChinese()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 7, 500));
    }

    public function getVideosRegionalJapan()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 8, 500, true, 'active'));
    }

    public function getVideoRegionalAfrican()
    {
        return VideoResource::collection($this->catalog->byCategory(4, 9, 100, true, 'active'));
    }
}
