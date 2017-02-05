<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Time;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Crown\DateTime\RhubarbDateTime;

class TimeTest extends HexTechnologyTestCase
{
    public function testTotalTime(){
        $time = new Time();
        $time->StartTime = new RhubarbDateTime("30 minutes ago");
        $time->EndTime = new RhubarbDateTime("now");// Now
        $time->save();

        $diff = $time->StartTime->diff($time->EndTime);

        $this->assertEquals($diff, $time->TotalTime);
    }
}