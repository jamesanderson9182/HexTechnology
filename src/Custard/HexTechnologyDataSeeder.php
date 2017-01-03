<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Asset;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Stem\Custard\DemoDataSeederInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HexTechnologyDataSeeder implements DemoDataSeederInterface
{

    public function seedData(OutputInterface $output)
    {
        $asset = new Asset();
        $asset->AssetName = "SM58";
        $asset->AssetType = "Microphone";
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
    }
}