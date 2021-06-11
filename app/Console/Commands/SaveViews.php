<?php

namespace App\Console\Commands;

use App\Models\Video;
use Illuminate\Console\Command;
use Alaouy\Youtube\Facades\Youtube;

class SaveViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update missing views';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        a:

        $video = Video::whereNull('views')->first();

        $videoApi = Youtube::getVideoInfo($video->videoId);

        if ($videoApi) {
            $video->views = $videoApi->statistics->viewCount;
            $video->save();
            echo $videoApi->snippet->title;
            echo " saved \n";
        } else {
            $video->views = 1;
            $video->save();
        }

        goto a;
    }
}
