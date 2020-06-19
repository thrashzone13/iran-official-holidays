<?php

namespace MirzaCodenevis\IOH;
class Qamari
{
    /** @var int $year */
    protected $year;

    /** @var int $month */
    protected $month;

    /** @var int $day */
    protected $day;

    /**
     * Qamari constructor.
     * @param int $year
     * @param int $month
     * @param int $day
     */
    public function __construct(int $year, int $month, int $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @return bool
     */
    public function isLeapYear(): bool
    {
        if (in_array($this->year % 30, [2, 5, 7, 10, 13, 16, 18, 21, 24, 26, 29]))
            return true;
        return false;
    }
}