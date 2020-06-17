<?php

namespace MirzaCodenevis\IOH;

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class Holiday
{
    /** @var string $title */
    protected $title;

    /** @var Jalalian $jalali */
    protected $jalali;

    /**
     * Holiday constructor.
     * @param string $title
     * @param Jalalian $jalali
     */
    public function __construct(string $title, Jalalian $jalali)
    {
        $this->title = $title;
        $this->jalali = $jalali;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return Jalalian
     */
    public function getJalali(): Jalalian
    {
        return $this->jalali;
    }

    /**
     * @return Carbon
     */
    public function getCarbon(): Carbon
    {
        return $this->getJalali()->toCarbon();
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->getCarbon()->toDatetime();
    }
}