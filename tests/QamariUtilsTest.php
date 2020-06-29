<?php

namespace MirzCodenevis\Tests;

use PHPUnit\Framework\TestCase;

class QamariUtilsTest extends TestCase
{
    public function test_qamari_to_gregorian()
    {
        $year = 1442;
        $day = 15;
//        var_dump($this->jdToGregorian($year, 1, 1) === '8/21/2020');
//        var_dump($this->jdToGregorian($year, 1, 2) === '8/22/2020');
//        var_dump($this->jdToGregorian($year, 1, 3) === '8/23/2020');
//        var_dump($this->jdToGregorian($year, 1, 4) === '8/24/2020');
//        var_dump($this->jdToGregorian($year, 1, 5) === '8/25/2020');
//        var_dump($this->jdToGregorian($year, 1, 6) === '8/26/2020');
//        var_dump($this->jdToGregorian($year, 1, 7) === '8/27/2020');
//        var_dump($this->jdToGregorian($year, 1, 8) === '8/28/2020');
//        var_dump($this->jdToGregorian($year, 1, 9) === '8/29/2020');
//        var_dump($this->jdToGregorian($year, 1, 10) === '8/30/2020');
//        var_dump($this->jdToGregorian($year, 1, 11) === '8/31/2020');
//        var_dump($this->jdToGregorian($year, 1, 12) === '9/1/2020');
//        var_dump($this->jdToGregorian($year, 1, 13) === '9/2/2020');
//        var_dump($this->jdToGregorian($year, 1, 14) === '9/3/2020');
//        var_dump($this->jdToGregorian($year, 1, 15) === '9/4/2020');
//        var_dump($this->jdToGregorian($year, 1, 16) === '9/5/2020');
//        var_dump($this->jdToGregorian($year, 1, 17) === '9/6/2020');
//        var_dump($this->jdToGregorian($year, 1, 18) === '9/7/2020');
//        var_dump($this->jdToGregorian($year, 1, 19) === '9/8/2020');
//        var_dump($this->jdToGregorian($year, 1, 20) === '9/9/2020');
//        var_dump($this->jdToGregorian($year, 1, 21) === '9/10/2020');
//        var_dump($this->jdToGregorian($year, 1, 22) === '9/11/2020');
//        var_dump($this->jdToGregorian($year, 1, 23) === '9/12/2020');
//        var_dump($this->jdToGregorian($year, 1, 24) === '9/13/2020');
//        var_dump($this->jdToGregorian($year, 1, 25) === '9/14/2020');
//        var_dump($this->jdToGregorian($year, 1, 26) === '9/15/2020');
//        var_dump($this->jdToGregorian($year, 1, 27) === '9/16/2020');
//        var_dump($this->jdToGregorian($year, 1, 28) === '9/17/2020');
//        var_dump($this->jdToGregorian($year, 1, 29) === '9/18/2020');
//        var_dump($this->jdToGregorian($year, 1, 30) === '9/19/2020');


//      var_dump($this->jdToGregorian($year, 3, $day), $this->qamariToJd($year, 3, $day));
//      var_dump(in_array($year % 30, [2, 5, 7, 10, 13, 16, 18, 21, 24, 26, 29]));
        var_dump($this->jdToGregorian($year, 1, $day) === '9/4/2020');
        var_dump($this->jdToGregorian($year, 2, $day) === '10/3/2020');
        var_dump($this->jdToGregorian($year, 3, $day) === '11/1/2020');
        var_dump($this->jdToGregorian($year, 4, $day) === '12/1/2020');
        var_dump($this->jdToGregorian($year, 5, $day) === '12/30/2020');
        var_dump($this->jdToGregorian($year, 6, $day) === '1/29/2021');
        var_dump($this->jdToGregorian($year, 7, $day) === '2/27/2021');
        var_dump($this->jdToGregorian($year, 8, $day) === '3/29/2021');
        var_dump($this->jdToGregorian($year, 9, $day) === '4/27/2021');
        var_dump($this->jdToGregorian($year, 10, $day) === '5/27/2021');
        var_dump($this->jdToGregorian($year, 11, $day) === '6/25/2021');
        var_dump($this->jdToGregorian($year, 12, $day) === '7/25/2021');

//        $year = 1441;
//        $day = 15;
//        var_dump($this->jdToGregorian($year, 1, $day) === '9/15/2019');
//        var_dump($this->jdToGregorian($year, 2, $day) === '10/14/2019');
//        var_dump($this->jdToGregorian($year, 3, $day) === '11/13/2019');
//        var_dump($this->jdToGregorian($year, 4, $day) === '12/12/2019');
//        var_dump($this->jdToGregorian($year, 5, $day) === '1/11/2020');
//        var_dump($this->jdToGregorian($year, 6, $day) === '2/10/2020');
//        var_dump($this->jdToGregorian($year, 7, $day) === '3/10/2020');
//        var_dump($this->jdToGregorian($year, 8, $day) === '4/9/2020');
//        var_dump($this->jdToGregorian($year, 9, $day) === '5/9/2020');
//        var_dump($this->jdToGregorian($year, 10, $day) === '6/7/2020');
//        var_dump($this->jdToGregorian($year, 11, $day) === '7/7/2020');
//        var_dump($this->jdToGregorian($year, 12, $day) === '8/5/2020');

//        $year = 1440;
//        $day = 15;
//        var_dump($this->jdToGregorian($year, 1, 1) === '9/11/2018');
//        var_dump($this->jdToGregorian($year, 1, 2) === '9/12/2018');
//        var_dump($this->jdToGregorian($year, 1, 3) === '9/13/2018');
//        var_dump($this->jdToGregorian($year, 1, 4) === '9/14/2018');
//        var_dump($this->jdToGregorian($year, 1, 5) === '9/15/2018');
//        var_dump($this->jdToGregorian($year, 1, 6) === '9/16/2018');
//        var_dump($this->jdToGregorian($year, 1, 7) === '9/17/2018');
//        var_dump($this->jdToGregorian($year, 1, 8) === '9/18/2018');
//        var_dump($this->jdToGregorian($year, 1, 9) === '9/19/2018');
//        var_dump($this->jdToGregorian($year, 1, 10) === '9/20/2018');
//        var_dump($this->jdToGregorian($year, 1, 11) === '9/21/2018');
//        var_dump($this->jdToGregorian($year, 1, 12) === '9/22/2018');
//        var_dump($this->jdToGregorian($year, 1, 13) === '9/23/2018');
//        var_dump($this->jdToGregorian($year, 1, 14) === '9/24/2018');
//        var_dump($this->jdToGregorian($year, 1, 15) === '9/25/2018');
//        var_dump($this->jdToGregorian($year, 1, 16) === '9/26/2018');
//        var_dump($this->jdToGregorian($year, 1, 17) === '9/27/2018');
//        var_dump($this->jdToGregorian($year, 1, 18) === '9/28/2018');
//        var_dump($this->jdToGregorian($year, 1, 19) === '9/29/2018');
//        var_dump($this->jdToGregorian($year, 1, 20) === '9/30/2018');
//        var_dump($this->jdToGregorian($year, 1, 21) === '10/1/2018');
//        var_dump($this->jdToGregorian($year, 1, 22) === '10/2/2018');
//        var_dump($this->jdToGregorian($year, 1, 23) === '10/3/2018');
//        var_dump($this->jdToGregorian($year, 1, 24) === '10/4/2018');
//        var_dump($this->jdToGregorian($year, 1, 25) === '10/5/2018');
//        var_dump($this->jdToGregorian($year, 1, 26) === '10/6/2018');
//        var_dump($this->jdToGregorian($year, 1, 27) === '10/7/2018');
//        var_dump($this->jdToGregorian($year, 1, 28) === '10/8/2018');
//        var_dump($this->jdToGregorian($year, 1, 29) === '10/9/2018');
//        var_dump($this->jdToGregorian($year, 1, 30) === '10/10/2018');

//        var_dump($year);
//        var_dump(in_array($year % 30, [2, 5, 7, 10, 13, 16, 18, 21, 24, 26, 29]));
//        var_dump($this->jdToGregorian($year, 1, $day) === '9/25/2018');
//        var_dump($this->jdToGregorian($year, 2, $day) === '10/25/2018');
//        var_dump($this->jdToGregorian($year, 3, $day) === '11/23/2018');
//        var_dump($this->jdToGregorian($year, 4, $day) === '12/23/2018');
//        var_dump($this->jdToGregorian($year, 5, $day) === '1/22/2019');
//        var_dump($this->jdToGregorian($year, 6, $day) === '2/21/2019');
//        var_dump($this->jdToGregorian($year, 7, $day) === '3/22/2019');
//        var_dump($this->jdToGregorian($year, 8, $day) === '4/21/2019');
//        var_dump($this->jdToGregorian($year, 9, $day) === '5/21/2019');
//        var_dump($this->jdToGregorian($year, 10, $day) === '6/19/2019');
//        var_dump($this->jdToGregorian($year, 11, $day) === '7/18/2019');
//        var_dump($this->jdToGregorian($year, 12, $day) === '8/17/2019');
    }

    public function qamariToJd($year, $month, $day)
    {
        return (11 * $year + 3) / 30 + 354 * $year + 30 * $month - ($month - 1) / 2 + $day + 1948440 - 385;
    }

    public function jdToGregorian($year, $month, $day)
    {
        $jd = $this->qamariToJd($year, $month, $day);

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

        return "{$month}/" . round($day) . "/{$year}";
    }

    public function isLeap($year): bool
    {
        return in_array($year % 30, [2, 5, 7, 10, 13, 16, 18, 21, 24, 26, 29]);
    }
}