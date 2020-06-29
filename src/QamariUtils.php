<?php

namespace MirzaCodenevis\IOH;

use Carbon\Carbon;

class QamariUtils
{
    /**
     * @return Qamari
     */
    public static function now(): Qamari
    {
        $now = Carbon::now("Asia/Tehran");
        return self::gregorianToQamari($now->year, $now->month, $now->day);
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return Carbon
     */
    public static function qamariToGregorian(int $year, int $month, int $day): Carbon
    {
        $jd = (11 * $year + 3) / 30 + 354 * $year + 30 * $month - ($month - 1) / 2 + $day + 1948440 - 385;

        if (in_array($month, [2, 3, 4, 5, 6, 7]))
            $jd = (int)floor($jd);
        else
            $jd = (int)ceil($jd);

        if ($jd > 2299160) {
            $l = $jd + 68569;
            $n = (int)((4 * $l) / 146097);
            $l = $l - (int)((146097 * $n + 3) / 4);
            $i = (int)((4000 * ($l + 1)) / 1461001);
            $l = $l - (int)((1461 * $i) / 4) + 31;
            $j = (int)((80 * $l) / 2447);
            $day = $l - (int)((2447 * $j) / 80);
            $l = (int)($j / 11);
            $month = $j + 2 - 12 * $l;
            $year = 100 * ($n - 49) + $i + $l;
        } else {
            $j = $jd + 1402;
            $k = (int)(($j - 1) / 1461);
            $l = $j - 1461 * $k;
            $n = (int)(($l - 1) / 365) - (int)($l / 1461);
            $i = $l - 365 * $n + 30;
            $j = (int)((80 * $i) / 2447);
            $day = $i - (int)((2447 * $j) / 80);
            $i = (int)($j / 11);
            $month = $j + 2 - 12 * $i;
            $year = 4 * $k + $n + $i - 4716;
        }

        return Carbon::createFromDate($year, $month, $day, 'Asia/Tehran')->setTime(0, 0);
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return Qamari
     */
    public static function gregorianToQamari(int $year, int $month, int $day): Qamari
    {
        if (($year > 1582) || (($year == 1582) && ($month > 10)) || (($year == 1582) && ($month == 10) && ($day > 14))) {
            $jd = (int)((1461 * ($year + 4800 + (int)(($month - 14) / 12))) / 4) + (int)((367 * ($month - 2 - 12 * ((int)(($month - 14) / 12)))) / 12) -
                (int)((3 * ((int)(($year + 4900 + (int)(($month - 14) / 12)) / 100))) / 4) + $day - 32075;
        } else {
            $jd = 367 * $year - (int)((7 * ($year + 5001 + (int)(($month - 9) / 7))) / 4) + (int)((275 * $month) / 9) + $day + 1729777;
        }

        $l = $jd - 1948440 + 10632;
        $n = (int)(($l - 1) / 10631);
        $l = $l - 10631 * $n + 354;
        $j = ((int)((10985 - $l) / 5316)) * ((int)((50 * $l) / 17719)) + ((int)($l / 5670)) * ((int)((43 * $l) / 15238));
        $l = $l - ((int)((30 - $j) / 15)) * ((int)((17719 * $j) / 50)) - ((int)($j / 16)) * ((int)((15238 * $j) / 43)) + 29;

        $month = (int)((24 * $l) / 709);
        $day = $l - (int)((709 * $month) / 24);
        $year = 30 * $n + $j - 30;

        return new Qamari($year, $month, $day);
    }

    /**
     * @param int $year
     * @return bool
     */
    public static function isLeapYear(int $year): bool
    {
        return in_array($year % 30, [2, 5, 7, 10, 13, 16, 18, 21, 24, 26, 29]);
    }
}
