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
        $video = Video::whereNull('duration')->first();
        if ($video) {
           $videoApi = Youtube::getVideoInfo($video->videoId);

        if ($videoApi) {
            $yduration = $videoApi->contentDetails->duration;
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

            $video->duration = $duration;
            $video->type_duration = $durationType;
            $video->save();
            echo  $video->id . " \n";
            echo  $video->title . " \n";
            echo " saved \n";
        } else {
            dd($video);
            echo "Video Id Not found \n";
        }


        } else {
            $duration = '00:00:00';
            $durationType = 1;
            $video->duration = $duration;
            $video->type_duration = $durationType;
            $video->save();

            echo " failed \n";
        }
         echo " goto A \n";
        goto a;
    }
}
