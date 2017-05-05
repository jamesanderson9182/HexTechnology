<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetRental;
use HexTechnology\Models\Rental;
use HexTechnology\Models\SerialNumber;
use HexTechnology\Tests\HexTechnologyTestCase;

class AssetRentalTest extends HexTechnologyTestCase
{

    public function testModelCreation()
    {
        $assetRental = new AssetRental();
        $assetRental->save();

        $this->assertEquals(1, sizeof(AssetRental::all()));
    }

    public function testRentalCanHaveAssets(){
        $asset = new Asset();
        $asset->AssetName = "Sure SM58";
        $asset->save();

        $serialNumber = new SerialNumber();
        $serialNumber->AssetID = $asset->AssetID;
        $serialNumber->save();

        $rental = new Rental();
        $rental->save();

        $assetRental = new AssetRental();
        $assetRental->RentalID = $rental->RentalID;
        $assetRental->SerialNumberID = $serialNumber->SerialNumberID;
        $assetRental->save();

       //TODO Assert some condition
    }
}