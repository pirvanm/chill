<?php

namespace App\Services\Youtube;

class DurationParser
{
    /**
     * Convert a YouTube ISO-8601 duration (e.g. "PT5M30S") into an "H:i:s"-ish
     * string plus the app's internal duration "bucket" (1 = shortest ... 5 = longest).
     *
     * @return array{duration: string, durationType: int}
     */
    public static function parse(?string $isoDuration): array
    {
        if (!$isoDuration) {
            return ['duration' => '00:00:00', 'durationType' => 0];
        }

        preg_match_all('/(\d+)/', $isoDuration, $parts);

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

        if ($hours != 0) {
            $duration = $hours . ':' . $minutes . ':' . $seconds;
        } else {
            $duration = '00' . ':' . $minutes . ':' . $seconds;
        }

        return ['duration' => $duration, 'durationType' => self::bucketFor($duration)];
    }

    private static function bucketFor(string $duration): int
    {
        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $duration);
        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
        $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;

        if ($time_seconds < 360) {
            return 1;
        }
        if ($time_seconds < 900) {
            return 2;
        }
        if ($time_seconds < 3000) {
            return 3;
        }
        if ($time_seconds < 7200) {
            return 4;
        }

        return 5;
    }
}
