<?php

namespace MirzaCodenevis\Holidays;

use Carbon\Carbon;

class QamariUtils
{
    /**
     * @param float $float
     * @return int
     */
    private static function intPart(float $float): int
    {
        if ($float < -0.0000001)
            return ceil($float - 0.0000001);
        else
            return floor($float + 0.0000001);
    }

    /**
     * @return Qamari
     */
    public static function now(): Qamari
    {
        $now = Carbon::now();
        return self::gregorianToQamari($now->year, $now->month, $now->day);
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return \DateTime
     */
    public static function qamariToGregorian(int $year, int $month, int $day): \DateTime
    {
        $jd = self::intPart((11 * $year + 3) / 30) + 354 * $year + 30 * $month - self::intPart(($month - 1) / 2) + $day + 1948440 - 385;

        if ($jd > 2299160) {
            $l = $jd + 68569;
            $n = self::intPart((4 * $l) / 146097);
            $l = $l - self::intPart((146097 * $n + 3) / 4);
            $i = self::intPart((4000 * ($l + 1)) / 1461001);
            $l = $l - self::intPart((1461 * $i) / 4) + 31;
            $j = self::intPart((80 * $l) / 2447);
            $day = $l - self::intPart((2447 * $j) / 80);
            $l = self::intPart($j / 11);
            $month = $j + 2 - 12 * $l;
            $year = 100 * ($n - 49) + $i + $l;
        } else {
            $j = $jd + 1402;
            $k = self::intPart(($j - 1) / 1461);
            $l = $j - 1461 * $k;
            $n = self::intPart(($l - 1) / 365) - self::intPart($l / 1461);
            $i = $l - 365 * $n + 30;
            $j = self::intPart((80 * $i) / 2447);
            $day = $i - self::intPart((2447 * $j) / 80);
            $i = self::intPart($j / 11);
            $month = $j + 2 - 12 * $i;
            $year = 4 * $k + $n + $i - 4716;
        }

        return Carbon::createFromDate($year, $month, $day)->toDateTime();
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return Qamari
     */
    public static function gregorianToQamari(int $year, int $month, int $day): Qamari
    {
        if (($year > 1582) or (($year == 1582) and ($month > 10)) or (($year == 1582) and ($month == 10) and ($day > 14))) {
            $jd = self::intPart((1461 * ($year + 4800 + self::intPart(($month - 14) / 12))) / 4) + self::intPart((367 * ($month - 2 - 12 * (self::intPart(($month - 14) / 12)))) / 12) -
                self::intPart((3 * (self::intPart(($year + 4900 + self::intPart(($month - 14) / 12)) / 100))) / 4) + $day - 32075;
        } else {
            $jd = 367 * $year - self::intPart((7 * ($year + 5001 + self::intPart(($month - 9) / 7))) / 4) + self::intPart((275 * $month) / 9) + $day + 1729777;
        }

        $l = $jd - 1948440 + 10632;
        $n = self::intPart(($l - 1) / 10631);
        $l = $l - 10631 * $n + 354;
        $j = (self::intPart((10985 - $l) / 5316)) * (self::intPart((50 * $l) / 17719)) + (self::intPart($l / 5670)) * (self::intPart((43 * $l) / 15238));
        $l = $l - (self::intPart((30 - $j) / 15)) * (self::intPart((17719 * $j) / 50)) - (self::intPart($j / 16)) * (self::intPart((15238 * $j) / 43)) + 29;

        $month = self::intPart((24 * $l) / 709);
        $day = $l - self::intPart((709 * $month) / 24);
        $year = 30 * $n + $j - 30;

        return new Qamari($year, $month, $day);
    }
}