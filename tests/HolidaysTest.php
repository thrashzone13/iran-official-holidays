<?php

namespace MirzCodenevis\Tests;

use MirzaCodenevis\IOH\Event;
use MirzaCodenevis\IOH\Holidays;
use Morilog\Jalali\Jalalian;
use PHPUnit\Framework\TestCase;

class HolidaysTest extends TestCase
{
//    public function test_set_year()
//    {
//        $this->assertTrue(get_class(Holidays::setYear(1399)) == Holidays::class);
//    }
//
//    public function test_current_year()
//    {
//        $this->assertTrue(get_class(Holidays::currentYear()) == Holidays::class);
//    }
//
//    public function test_shamis_events()
//    {
//        $this->assertTrue(is_array(Holidays::currentYear()->shamsiEvents()));
//    }

    public function test_qamari_events()
    {
        /** @var Event $event */
        foreach (Holidays::setYear(1398)->qamariEvents() as $event) {
            var_dump($event->getJalali()->format('d-m'));
        }
    }

//    public function test_all_events()
//    {
//        $this->assertTrue(is_array(Holidays::currentYear()->allEvents()));
//    }
//
//    public function test_is_today_holiday()
//    {
//        $this->assertTrue(Holidays::currentYear()->isTodayHoliday());
//    }

    private $qamari_events_of_1397 = [

    ];

    private $qamari_events_of_1398 = [
        ['day' => 14, 'month' => 1, 'title' => 'مبعث'],
        ['day' => 1, 'month' => 2, 'title' => 'زادروز حجت بن الحسن'],

        ['day' => 5, 'month' => 3, 'title' => 'شهادت علی بن ابی طالب'],//6

        ['day' => 15, 'month' => 3, 'title' => 'عید فطر'],
        ['day' => 16, 'month' => 3, 'title' => 'عید فطر'],
        ['day' => 8, 'month' => 4, 'title' => 'شهادت جعفر صادق'],
        ['day' => 21, 'month' => 5, 'title' => 'عید قربان'],
        ['day' => 29, 'month' => 5, 'title' => 'عید غدیر'],

        ['day' => 18, 'month' => 6, 'title' => 'تاسوعا'],//
        ['day' => 19, 'month' => 6, 'title' => 'شهادت حسین بن علی عاشورا'],//

        ['day' => 27, 'month' => 7, 'title' => 'چهلم حسین بن علی اربعین'],
        ['day' => 5, 'month' => 8, 'title' => 'شهادت پیامبر اسلام و حسن مجتبی'],
        ['day' => 7, 'month' => 8, 'title' => 'شهادت علی بن موسی الرضا'],//
        ['day' => 15, 'month' => 8, 'title' => 'شهادت حسن بن علی عسکری'],
        ['day' => 24, 'month' => 8, 'title' => 'زادروز پیامبر اسلام و جعفر صادق'],
        ['day' => 9, 'month' => 11, 'title' => 'شهادت فاطمه الزهرا'],//
        ['day' => 18, 'month' => 12, 'title' => 'زادروز علی بن ابی طالب'],
    ];

    private $qamari_events_of_1399 = [
        ['day' => 3, 'month' => 1, 'title' => 'مبعث'],
        ['day' => 21, 'month' => 1, 'title' => 'زادروز حجت بن الحسن'],

        ['day' => 26, 'month' => 2, 'title' => 'شهادت علی بن ابی طالب'],//25

        ['day' => 4, 'month' => 3, 'title' => 'عید فطر'],
        ['day' => 5, 'month' => 3, 'title' => 'عید فطر'],
        ['day' => 28, 'month' => 3, 'title' => 'شهادت جعفر صادق'],
        ['day' => 10, 'month' => 5, 'title' => 'عید قربان'],
        ['day' => 18, 'month' => 5, 'title' => 'عید غدیر'],

        ['day' => 8, 'month' => 6, 'title' => 'تاسوعا'],//7
        ['day' => 9, 'month' => 6, 'title' => 'شهادت حسین بن علی عاشورا'],//8

        ['day' => 17, 'month' => 7, 'title' => 'چهلم حسین بن علی اربعین'],
        ['day' => 25, 'month' => 7, 'title' => 'شهادت پیامبر اسلام و حسن مجتبی'],
        ['day' => 26, 'month' => 7, 'title' => 'شهادت علی بن موسی الرضا'],
        ['day' => 4, 'month' => 8, 'title' => 'شهادت حسن بن علی عسکری'],
        ['day' => 13, 'month' => 8, 'title' => 'زادروز پیامبر اسلام و جعفر صادق'],
        ['day' => 28, 'month' => 10, 'title' => 'شهادت فاطمه الزهرا'],
        ['day' => 7, 'month' => 12, 'title' => 'زادروز علی بن ابی طالب'],
        ['day' => 21, 'month' => 12, 'title' => 'مبعث'],
    ];
}