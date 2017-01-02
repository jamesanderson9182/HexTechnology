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
        $asset->AssetType = "Other";
        $asset->CurrentRentalCost = 5.00;
        $asset->SerialNumber = "asdfasdf";
        $asset->InitialCost = 90.00;
        $asset->save();
    }
}