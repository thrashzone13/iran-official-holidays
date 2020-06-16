<?php

namespace MirzCodenevis\Tests;

use MirzaCodenevis\IOH\Holidays;
use PHPUnit\Framework\TestCase;

class HolidaysTest extends TestCase
{
    public function test_set_year()
    {
        $this->assertTrue(get_class(Holidays::setYear(1399)) == Holidays::class);
    }

    public function test_current_year()
    {
        $this->assertTrue(get_class(Holidays::currentYear()) == Holidays::class);
    }

    public function test_shamis_events()
    {
        $this->assertTrue(is_array(Holidays::currentYear()->shamsiEvents()));
    }

    public function test_qamari_events()
    {
        $this->assertTrue(is_array(Holidays::currentYear()->qamariEvents()));
    }

    public function test_all_events()
    {
        $this->assertTrue(is_array(Holidays::currentYear()->allEvents()));
    }

    public function test_is_today_holiday()
    {
        //
    }
}