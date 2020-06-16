<?php

namespace MirzaCodenevis\Holidays;

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use Morilog\Jalali\CalendarUtils;

class Holidays
{
    /** @var int $currentShamsiYear */
    private static $currentShamsiYear;

    /** @var int $currentQamariYear */
    private static $currentQamariYear;

    /** @var array $shamsiEvents */
    private static $shamsiEvents = [
        ['day' => 1, 'month' => 1, 'title' => 'نوروز'],
        ['day' => 2, 'month' => 1, 'title' => 'نوروز'],
        ['day' => 3, 'month' => 1, 'title' => 'نوروز'],
        ['day' => 4, 'month' => 1, 'title' => 'نوروز'],
        ['day' => 12, 'month' => 1, 'title' => 'روز جمهوری اسلامی'],
        ['day' => 13, 'month' => 1, 'title' => 'روز طبیعت'],
        ['day' => 14, 'month' => 3, 'title' => 'رحلت آیت الله خمینی'],
        ['day' => 15, 'month' => 3, 'title' => 'قیام ۱۵ خرداد'],
        ['day' => 22, 'month' => 11, 'title' => 'پیروزی انقلاب ۵۷ ایران'],
        ['day' => 29, 'month' => 12, 'title' => 'ملی شدن صنعت نفت'],
    ];

    /** @var array $qamariEvents */
    private static $qamariEvents = [
        ['day' => 9, 'month' => 1, 'title' => 'تاسوعا'],
        ['day' => 10, 'month' => 1, 'title' => 'شهادت حسین بن علی عاشورا'],
        ['day' => 20, 'month' => 2, 'title' => 'چهلم حسین بن علی اربعین'],
        ['day' => 28, 'month' => 2, 'title' => 'شهادت پیامبر اسلام و حسن مجتبی'],
        ['day' => 30, 'month' => 2, 'title' => 'شهادت علی بن موسی الرضا'],
        ['day' => 8, 'month' => 3, 'title' => 'شهادت حسن بن علی عسکری'],
        ['day' => 17, 'month' => 3, 'title' => 'زادروز پیامبر اسلام و جعفر صادق'],
        ['day' => 3, 'month' => 6, 'title' => 'شهادت فاطمه الزهرا'],
        ['day' => 13, 'month' => 7, 'title' => 'زادروز علی بن ابی طالب'],
        ['day' => 27, 'month' => 7, 'title' => 'زادروز علی بن ابی طالب'],
        ['day' => 15, 'month' => 8, 'title' => 'زادروز حجت بن الحسن'],
        ['day' => 21, 'month' => 9, 'title' => 'شهادت علی بن ابی طالب'],
        ['day' => 1, 'month' => 10, 'title' => 'عید فطر'],
        ['day' => 2, 'month' => 10, 'title' => 'عید فطر'],
        ['day' => 25, 'month' => 10, 'title' => 'شهادت جعفر صادق'],
        ['day' => 10, 'month' => 12, 'title' => 'عید قربان'],
        ['day' => 18, 'month' => 12, 'title' => 'عید غدیر'],
    ];

    /**
     * Holidays constructor.
     * @param int|null $year
     */
    private function __construct(int $year = null)
    {

        self::$currentShamsiYear = $year ?? Jalalian::now()->getYear();
        if (!is_null($year)) {
            $gregorian = Carbon::now();
            self::$currentQamariYear = QamariUtils::gregorianToQamari(
               $gregorian->year, $gregorian->month, $gregorian->day
            )->getYear();
        } else
            self::$currentQamariYear = QamariUtils::now()->getYear();
    }

    /**
     * @param int $year
     * @return static
     */
    public static function setYear(int $year): self
    {
        return new Holidays($year);
    }

    /**
     * @return array
     */
    public static function allEvents(): array
    {
        return array_merge(self::shamsiEvents(), self::qamariEvents());
    }

    /**
     * @return array
     */
    public static function qamariEvents(): array
    {
        $events = [];
        foreach (self::$qamariEvents as $event) {
            $jalali = Jalalian::fromDateTime(QamariUtils::qamariToGregorian(self::$currentQamariYear, $event['month'], $event['day']));
            array_push($events, [
                'title' => $event['title'],
                'datetime' => Carbon::createFromDate($jalali->getYear(), $jalali->getMonth(), $jalali->getDay(), "Asia/Tehran")
            ]);
        }

        return $events;
    }

    /**
     * @return array
     */
    public static function shamsiEvents(): array
    {
        $events = [];
        foreach (self::$shamsiEvents as $event) {
            array_push($events, [
                'title' => $event['title'],
                'datetime' => Carbon::createFromDate(self::$currentShamsiYear, $event['month'], $event['day'], "Asia/Tehran")->toDateTime()
            ]);
        }

        return $events;
    }

    /**
     * @return bool
     */
    public static function todayIsHoliDay(): bool
    {
        $today = Jalalian::fromCarbon(Carbon::now("Asia/Tehran"))->format("m/d");
        $holiDay = [];
        foreach(self::allEvents() as $event) {
            array_push($holiDay, $event['datetime']->format('m/d'));
        }
        return in_array($today, $holiDay);
    }

}