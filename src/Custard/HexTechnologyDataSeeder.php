<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\Manufacturer;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Stem\Custard\DemoDataSeederInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HexTechnologyDataSeeder implements DemoDataSeederInterface
{

    public function seedData(OutputInterface $output)
    {
        $this->SeedAssets();
    }

    public function SeedAssets()
    {
        /*
         * SM58s
         */
        $assetType = new AssetType();
        $assetType->AssetTypeName = "Microphone";
        $assetType->save();

        $manufacturer = new Manufacturer();
        $manufacturer->ManufacturerName = "Sure";
        $manufacturer->save();

        $asset = new Asset();
        $asset->AssetName = "Sure SM58";
        $asset->RentalCostPerDay = 5.0;
        $asset->RentalCostPerWeek = 31.50;
        $asset->ManufacturerID = $manufacturer->ManufacturerID;
        $asset->Model = "SM58";
        $asset->AssetTypeID = $assetType->AssetTypeID;
        $asset->MaxPowerRating = "NA";
        $asset->Description = "Vocal microphone, boosted slightly in the mid range. Extremely versatile. Hard to damage";
        $asset->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "SM58_1";
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "SM58_2";
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "SM58_3";
        $serial->InitialValue = 90;
        $serial->CurrentValue = 80;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();

        /**
         * QU 32
         */

        $assetType = new AssetType();
        $assetType->AssetTypeName = "Sound Desk";
        $assetType->save();

        $manufacturer = new Manufacturer();
        $manufacturer->ManufacturerName = "Allen and Heath";
        $manufacturer->save();

        $asset = new Asset();
        $asset->AssetName = "Allen & Heath QU 32";
        $asset->RentalCostPerDay = 50.00;
        $asset->RentalCostPerWeek = 315;
        $asset->Description = "32 Channel, 40 input, 18 output Digital Sound Desk. admin password is 'password'".
        $asset->AssetTypeID = $assetType->AssetTypeID;
        $asset->MaxPowerRating = "Na";
        $asset->Model = "QU 32";
        $asset->ManufacturerID = $manufacturer->ManufacturerID;
        $asset->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "QU32X-525659";
        $serial->InitialValue = 3500;
        $serial->CurrentValue = 3400;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();

        /**
         * Behringer sound desk
         */

        $manufacturer = new Manufacturer();
        $manufacturer->ManufacturerName = "Behringer";
        $manufacturer->save();

        $asset = new Asset();
        $asset->AssetName = "Behringer X1222";
        $asset->RentalCostPerDay = 15;
        $asset->RentalCostPerWeek = 30;
        $asset->Description = "Handy wee desk! ".
            $asset->AssetTypeID = $assetType->AssetTypeID;
        $asset->MaxPowerRating = "Na";
        $asset->Model = "X1222";
        $asset->ManufacturerID = $manufacturer->ManufacturerID;
        $asset->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "X122jrdl";
        $serial->InitialValue = 100;
        $serial->CurrentValue = 90;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();

        $serial = new SerialNumber();
        $serial->SerialNumberCode = "X122jraaaaa";
        $serial->InitialValue = 100;
        $serial->CurrentValue = 90;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();
    }
}