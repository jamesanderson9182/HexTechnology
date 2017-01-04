<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Stem\Custard\DemoDataSeederInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HexTechnologyDataSeeder implements DemoDataSeederInterface
{

    public function seedData(OutputInterface $output)
    {
        $assetType = new AssetType();
        $assetType->AssetTypeName = "Microphone";
        $assetType->save();

        $asset = new Asset();
        $asset->AssetName = "SM58";
        $asset->AssetTypeID = $assetType->AssetTypeID;
        $asset->RentalCostPerDay = 5.0;
        $asset->RentalCostPerWeek = 5.0;
        $asset->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "SM58_1";
        $serial->AssetID = $asset->AssetID;
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "SM58_2";
        $serial->AssetID = $asset->AssetID;
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "SM58_3";
        $serial->AssetID = $asset->AssetID;
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->save();

        $assetType = new AssetType();
        $assetType->AssetTypeName = "Sound Desk";
        $assetType->save();

        $asset = new Asset();
        $asset->AssetName = "Allen & Heath QU 32";
        $asset->AssetTypeID = $assetType->AssetTypeID;
        $asset->RentalCostPerDay = 50.00;
        $asset->RentalCostPerWeek = 315;
        $asset->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "QU32X-525659";
        $serial->AssetID = $asset->AssetID;
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->save();

    }
}