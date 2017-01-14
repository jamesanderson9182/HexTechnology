<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\Client;
use HexTechnology\Models\Manufacturer;
use HexTechnology\Models\Project;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Stem\Custard\DemoDataSeederInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HexTechnologyDataSeeder implements DemoDataSeederInterface
{

    public function seedData(OutputInterface $output)
    {
        $this->SeedAssets();
        $this->SeedClients();
        $this->SeedProjects();
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
        $asset->Description = "32 Channel, 40 input, 18 output Digital Sound Desk. admin password is 'password'" .
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
        $asset->Description = "Handy wee desk! " .
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

    public function SeedClients()
    {

        $client = new Client();
        $client->ClientDisplayName = "David Johnston";
        $client->Forename = "David";
        $client->Surname = "Johnston";
        $client->AddressLine1 = "265-6016 Tortor Ave";
        $client->Postcode = "T3M 6K1";
        $client->Town = "Grumo Appula";
        $client->Mobile = "(01450) 21815";
        $client->Telephone = "(016977) 6769";
        $client->Email = "sodalesnisimagna@temporarcuVestibulumca";
        $client->save();

        $client = new Client();
        $client->ClientDisplayName = "James Anderson";
        $client->Forename = "James";
        $client->Surname = "Anderson";
        $client->AddressLine1 = "612-8676 Ante Road";
        $client->Postcode = "Y6H 5Y2";
        $client->Town = "Calder";
        $client->Mobile = "07624 343302";
        $client->Telephone = "07517 304635";
        $client->Email = "musProinvel@eleifendegestasSednet";
        $client->save();

        $client = new Client();
        $client->ClientDisplayName = "Dan Moore";
        $client->Forename = "Dan";
        $client->Surname = "Moore";
        $client->AddressLine1 = "6751 Risus. Road";
        $client->Postcode = "L9B 7X1";
        $client->Town = "Ways";
        $client->Mobile = "0800 1111";
        $client->Telephone = "0894 750 3043";
        $client->Email = "lectus.justo.eu@enimNuncut.net";
        $client->save();

        $client = new Client();
        $client->ClientDisplayName = "Paul Moorehead";
        $client->Forename = "Paul";
        $client->Surname = "Moorehead";
        $client->AddressLine1 = "5293 Arcu. Rd.";
        $client->Postcode = "HH1X 5LG";
        $client->Town = "Paradise";
        $client->Mobile = "(023) 0016 6387";
        $client->Telephone = "0800 1111";
        $client->Email = "dignissim.lacus@mi.org";
        $client->save();

        $client = new Client();
        $client->ClientDisplayName = "Thomas Glass";
        $client->Forename = "Thomas";
        $client->Surname = "Glass";
        $client->AddressLine1 = "496-1874 Consectetuer Road";
        $client->Postcode = "P8H 8G9";
        $client->Town = "Sainte-Marie-Chevigny";
        $client->Mobile = "(016977) 3844";
        $client->Telephone = "07624 769617";
        $client->Email = "parturient@auguescelerisquemollis.com";
        $client->save();

        $client = new Client();
        $client->ClientDisplayName = "Sam Thompson";
        $client->Forename = "Sam";
        $client->Surname = "Thompson";
        $client->AddressLine1 = "1685 Quis Rd.";
        $client->Postcode = "K5C 2H4";
        $client->Town = "Montalto Uffugo";
        $client->Mobile = "(01310) 079430";
        $client->Telephone = "07624 451546";
        $client->Email = "nunc.est.mollis@sedorci.co.uk";
        $client->save();

        $client = new Client();
        $client->ClientDisplayName = "Timothy Hancock";
        $client->Forename = "Timothy";
        $client->Surname = "Hancock";
        $client->AddressLine1 = "Ap #217-2694 Dolor. Rd.";
        $client->Postcode = "P1A 0W9";
        $client->Town = "Middlesbrough";
        $client->Mobile = "076 4063 6734";
        $client->Telephone = "(0113) 954 3727";
        $client->Email = "dapibus.quam.quis@afelisullamcorper.co.uk";
        $client->save();
    }

    public function SeedProjects(){

        /*
         * Projects for Hillary
         */

        $client = new Client();
        $client->ClientDisplayName = "Hillary Thompson";
        $client->Forename = "Hillary";
        $client->Surname = "Thompson";
        $client->AddressLine1 = "Ap #119-2029 Morbi St.";
        $client->Postcode = "UY4U 7CY";
        $client->Town = "Akhisar";
        $client->Mobile = "0861 794 5942";
        $client->Telephone = "070 7521 6106";
        $client->Email = "scelerisque.mollis@Phasellus.edu";
        $client->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "VHS To DVD";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Sky Box to DVD";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "New Years Eve";
        $project->save();

        /*
         * Projects for Trinity
         */

        $client = new Client();
        $client->ClientDisplayName = "Trinity Methodist Church";
        $client->Forename = "Paul";
        $client->Surname = "Coulter";
        $client->AddressLine1 = "563-904 Sollicitudin Avenue";
        $client->Postcode = "M1L 1Y5";
        $client->Town = "Glimes";
        $client->Mobile = "0800 1111";
        $client->Telephone = "055 2556 9122";
        $client->Email = "nec.euismod.in@auctornunc.org";
        $client->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Variety Concert";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "QU32 Training";
        $project->save();

        /*
         * Projects in Kilkeel
         */

        $client = new Client();
        $client->ClientDisplayName = "FuseFM";
        $client->Forename = "Roberta";
        $client->Surname = "Heaney";
        $client->AddressLine1 = "P.O. Box 856 5228 Mauris Ave";
        $client->Postcode = "V09 8PN";
        $client->Town = "Mödling";
        $client->Mobile = "070 0204 8595";
        $client->Telephone = "0845 46 49";
        $client->Email = "Aliquam.auctor.velit@interdumfeugiatSed.edu";
        $client->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "11th Night 2016";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "12th 2016";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "11th Day Tent Band 2016";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Christmas Presenter Training";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Plugging in ethernet cable";
        $project->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "GTFO Training";
        $project->save();

        /*
         * Projects that don't have a client
         */
        $project = new Project();
        $project->ProjectName = "No clients, woo!";
        $project->save();
    }
}