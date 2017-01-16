<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\SerialNumber;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Crown\DateTime\RhubarbDate;

class SerialNumberTest extends HexTechnologyTestCase
{
    public function testBeforeSaveDateAddedToSystem()
    {
        $serialNumber = new SerialNumber();
        $serialNumber->save();

        $testSerial = new SerialNumber($serialNumber->SerialNumberID);
        $this->assertEquals($testSerial->DateAddedToSystem, new RhubarbDate("Today"), "Date added to the system should be automatically added to the system beforeSave");
    }
}