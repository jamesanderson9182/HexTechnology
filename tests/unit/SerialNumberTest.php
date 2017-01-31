<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Asset;
use HexTechnology\Models\SerialNumber;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Stem\Exceptions\ModelConsistencyValidationException;

class SerialNumberTest extends HexTechnologyTestCase
{
    public function testBeforeSaveDateAddedToSystem()
    {
        $serialNumber = new SerialNumber();
        $serialNumber->save();

        $testSerial = new SerialNumber($serialNumber->SerialNumberID);
        $this->assertEquals(
            $testSerial->DateAddedToSystem,
            new RhubarbDate("Today"),
            "Date added to the system should be automatically added to the system beforeSave"
        );
    }

    public function testAssetCantHaveTwoOfSameSerialNumbers()
    {
        $this->assertThrowsException(ModelConsistencyValidationException::class, function () {
            $asset = new Asset();
            $asset->AssetName = "Sure SM58";
            $asset->save();

            $serialNumber = new SerialNumber();
            $serialNumber->AssetID = $asset->AssetID;
            $serialNumber->SerialNumberCode = "SM581";
            $serialNumber->save();

            $serialNumber = new SerialNumber();
            $serialNumber->AssetID = $asset->AssetID;
            $serialNumber->SerialNumberCode = "SM581";
            $serialNumber->save();
        }, "An asset Can't have two serial numbers with the same code");
    }
}