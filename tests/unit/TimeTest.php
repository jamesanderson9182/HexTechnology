<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Time;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Crown\DateTime\RhubarbDateTime;

class TimeTest extends HexTechnologyTestCase
{
    public function testTotalHours(){
        $time = new Time();
        $time->StartTime = "2017-01-01 00:00:00";
        $time->EndTime = "2017-01-01 00:30:00";// 30 minutes i.e. 0.5 hours
        $time->save();

        $this->assertEquals(0.5, round($time->TotalHours, 1));
    }
}