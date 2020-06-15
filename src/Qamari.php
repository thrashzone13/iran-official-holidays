<?php

namespace MirzaCodenevis\Holidays;
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
}