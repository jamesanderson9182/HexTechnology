<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Asset;
use Rhubarb\Stem\Custard\DemoDataSeederInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HexTechnologyDataSeeder implements DemoDataSeederInterface
{

    public function seedData(OutputInterface $output)
    {
        $asset = new Asset();
        $asset->AssetName = "SM58";
        $asset->AssetType = "Microphone";
        $asset->CurrentRentalCost = 5.00;
        $asset->SerialNumber = "asdfasdf";
        $asset->InitialCost = 90.00;
        $asset->save();

        $asset = new Asset();
        $asset->AssetName = "Sure Beta 58";
        $asset->AssetType = "Microphone";
        $asset->CurrentRentalCost = 6.00;
        $asset->SerialNumber = "asdfasdg";
        $asset->InitialCost = 100.00;
        $asset->save();

        $asset = new Asset();
        $asset->AssetName = "Allen & Heath QU 32";
        $asset->AssetType = "Sound Desk";
        $asset->CurrentRentalCost = 100.00;
        $asset->SerialNumber = "asdfasdf";
        $asset->InitialCost = 3000.00;
        $asset->save();
    }
}