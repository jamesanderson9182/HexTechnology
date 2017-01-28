<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\Manufacturer;
use HexTechnology\Models\SerialNumber;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Crown\DateTime\RhubarbDate;

class AssetTest extends HexTechnologyTestCase
{
	public function testCanAccessRelated()
	{
        $assetType = new AssetType();
        $assetType->AssetTypeName = "Wire";
        $assetType->save();

        $manufacturer = new Manufacturer();
        $manufacturer->ManufacturerName = "Thomann";
        $manufacturer->save();

        $asset = new Asset();
        $asset->AssetName = "Sssnake";
        $asset->RentalCostPerDay = 1.0;
        $asset->RentalCostPerWeek = 4;
        $asset->ManufacturerID = $manufacturer->ManufacturerID;
        $asset->Model = "5m";
        $asset->AssetTypeID = $assetType->AssetTypeID;
        $asset->MaxPowerRating = "NA";
        $asset->Description = "Aright wire like";
        $asset->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "XLR_5m_1";
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();

        /** @var Asset $testAsset */
        $testAsset = new Asset($asset->AssetID);
        $this->assertEquals(
            "XLR_5m_1",
            $testAsset->SerialNumbers[0]->SerialNumberCode,
            "Assets should have access to their serial numbers"
        );

        $this->assertEquals(
            "Thomann",
            $testAsset->Manufacturer->ManufacturerName,
            "Assets should have access to their manufacturer"
        );

        $this->assertEquals(
            "Wire",
            $testAsset->AssetType->AssetTypeName,
            "Assets should have access to their asset type"
        );
	}

	public function testAssetNameNotSet() {
	    $manufacturer = new Manufacturer();
	    $manufacturer->ManufacturerName = "Thomann";
	    $manufacturer->save();

        $asset = new Asset();
        $asset->ManufacturerID = $manufacturer->ManufacturerID;
        $asset->Model = "15m";
        $asset->save();

        $this->assertEquals(
            $asset->AssetName,
            $manufacturer->ManufacturerName . " " . $asset->Model,
            "If AssetName is not set, but manufacturer and model are use those with a space"
        );
    }

    public function testCountOfAssetSerials() {
        $manufacturer = new Manufacturer();
        $manufacturer->ManufacturerName = "Thomann";
        $manufacturer->save();

        $asset = new Asset();
        $asset->ManufacturerID = $manufacturer->ManufacturerID;
        $asset->Model = "15m";
        $asset->save();

        $serialNumber = new SerialNumber();
        $serialNumber->AssetID = $asset->AssetID;
        $serialNumber->save();

        $serialNumber = new SerialNumber();
        $serialNumber->AssetID = $asset->AssetID;
        $serialNumber->save();

        $serialNumber = new SerialNumber();
        $serialNumber->AssetID = $asset->AssetID;
        $serialNumber->save();

        $serialNumber = new SerialNumber();
        $serialNumber->AssetID = $asset->AssetID;
        $serialNumber->save();

        $serialNumber = new SerialNumber();
        $serialNumber->AssetID = $asset->AssetID;
        $serialNumber->save();

        $this->assertEquals(
            5,
            $asset->NumberOwned,
            "Number Owned of each asset should be the count of Serial Numbers"
        );
	}
}