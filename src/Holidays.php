<?php

namespace MirzaCodenevis\IOH;

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class Holidays
{
    /** @var Holidays|null $instance */
    private static $instance;

    /** @var int $currentShamsiYear */
    private static $currentShamsiYear;

    /** @var int $currentQamariYear */
    private static $currentQamariYear;

    /** @var array $shamsiEvents */
    private $shamsiEvents = [
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
    private $qamariEvents = [
        ['day' => 9, 'month' => 1, 'title' => 'تاسوعا'],
        ['day' => 10, 'month' => 1, 'title' => 'شهادت حسین بن علی عاشورا'],

        ['day' => 20, 'month' => 2, 'title' => 'چهلم حسین بن علی اربعین'], //
        ['day' => 28, 'month' => 2, 'title' => 'شهادت پیامبر اسلام و حسن مجتبی'], //
        ['day' => 29, 'month' => 2, 'title' => 'شهادت علی بن موسی الرضا'], //

        ['day' => 8, 'month' => 3, 'title' => 'شهادت حسن بن علی عسکری'], //
        ['day' => 17, 'month' => 3, 'title' => 'زادروز پیامبر اسلام و جعفر صادق'], //

        ['day' => 3, 'month' => 6, 'title' => 'شهادت فاطمه الزهرا'], //

        ['day' => 13, 'month' => 7, 'title' => 'زادروز علی بن ابی طالب'], //
        ['day' => 27, 'month' => 7, 'title' => 'مبعث'], //

        ['day' => 15, 'month' => 8, 'title' => 'زادروز حجت بن الحسن'],

        ['day' => 21, 'month' => 9, 'title' => 'شهادت علی بن ابی طالب'],

        ['day' => 1, 'month' => 10, 'title' => 'عید فطر'],
        ['day' => 2, 'month' => 10, 'title' => 'عید فطر'],
        ['day' => 25, 'month' => 10, 'title' => 'شهادت جعفر صادق'],

        ['day' => 10, 'month' => 12, 'title' => 'عید قربان'],
        ['day' => 18, 'month' => 12, 'title' => 'عید غدیر'],
    ];

    /**
     * private constructor
     */
    public function __construct()
    {
        /**
         * Setting up current shamsi year
         * @var int currentShamsiYear
         */
        self::$currentShamsiYear = Jalalian::now()->getYear();

        /**
         * Setting up current qamari year
         * @var int currentQamariYear
         */
        self::$currentQamariYear = QamariUtils::now()->getYear();
    }

    public static function currentYear()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public static function setYear(int $year): self
    {
        if (is_null(self::$instance)) {
            return self::currentYear()::setYear($year);
        }

        /**
         * Setting up new shamsi year value
         * @var int currentShamsiYear
         */
        self::$currentShamsiYear = $year;

        /** @var Carbon $gregorian */
        $gregorian = (new Jalalian($year, 1, 1))->toCarbon();

        /**
         * Setting up new qamari year value
         * @var int currentQamariYear
         */
        self::$currentQamariYear = QamariUtils::gregorianToQamari(
            $gregorian->year, $gregorian->month, $gregorian->day
        )->getYear();

        return self::$instance;
    }

    /**
     * @return array
     */
    public function allEvents(): array
    {
        return array_merge($this->shamsiEvents(), $this->qamariEvents());
    }

    /**
     * @return array
     */
    public function qamariEvents(): array
    {
        $events = [];
        /**
         * As qamari year changes during a shamsi year,
         * events should be caught from two years.
         */
        for ($year = self::$currentQamariYear - 1; $year <= (self::$currentQamariYear + 1); $year++) {
            foreach ($this->qamariEvents as $event) {
                $jalali = Jalalian::fromDateTime(QamariUtils::qamariToGregorian($year, $event['month'], $event['day']));
                if (self::$currentShamsiYear === $jalali->getYear()) {
                    array_push($events, new Event($event['title'], $jalali));
                }
            }
        }

        return $events;
    }

    /**
     * @return array
     */
    public function shamsiEvents(): array
    {
        $events = [];
        foreach ($this->shamsiEvents as $event) {
            array_push($events, new Event($event['title'], new Jalalian(self::$currentShamsiYear, $event['month'], $event['day'])));
        }

        return $events;
    }

    /**
     * Checks the current date is holiday
     *
     * @return bool
     */
    public static function isTodayHoliday(): bool
    {
        $today = Carbon::now("Asia/Tehran")->format("Y/m/d");
        foreach (self::currentYear()->allEvents() as $event) {
            dd($today, $event->getDateTime(), $event->getDateTime()->format('Y/m/d'));
            if ($today == $event->getDateTime()->format('m/d')) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks the given date is holiday
     *
     * @return bool
     */
    public function isHoliday(Carbon $carbonTime, ?string $calendar = "all"): bool
    {
        $today = $carbonTime->format("Y/m/d");
        $events = [];
        if ($calendar == "all") {
            $events = self::currentYear()->allEvents();
        } elseif ($calendar == "shamsi") {
            $events = self::currentYear()->shamsiEvents();
        } elseif ($calendar == "qamari") {
            $events = self::currentYear()->qamariEvents();
        }
        foreach ($events as $event) {
            if ($today == $event->getDateTime()->format('Y/m/d')) {
                return true;
            }

        }
        return false;
    }
}
