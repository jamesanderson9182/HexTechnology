<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\Client;
use HexTechnology\Models\Manufacturer;
use HexTechnology\Models\Project;
use HexTechnology\Models\Expense;
use HexTechnology\Models\Quote;
use HexTechnology\Models\QuoteItem;
use HexTechnology\Models\SerialNumber;
use HexTechnology\Models\Task;
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
        $this->SeedExpenses();
        $this->SeedTasks();
        $this->SeedQuotes();
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
    }

    public function SeedProjects()
    {

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

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "DVDs";
        $expense->ExpenseDetails = "Had to buy a dvd to burn onto";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 1;
        $expense->UnitCost = 2;
        $expense->TotalCharge = 2;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Do what I'm told";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Sky Box to DVD";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "DVDs";
        $expense->ExpenseDetails = "Had to buy a dvd to burn onto";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 1;
        $expense->UnitCost = 2;
        $expense->TotalCharge = 2;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Do what I'm told";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "New Years Eve";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Broken Microphone";
        $expense->ExpenseDetails = "Had to buy a new microphone as one got dropped into pool by drunkard";
        $expense->NumberOfUnits = 1;
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->UnitCost = 2;
        $expense->TotalCharge = 2;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Park the cars";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        /*
         * Projects for Trinity, I'm putting a Quote on this too
         */

        $client = new Client();
        $client->ClientDisplayName = "Trinity Methodist Church";
        $client->Forename = "Paul";
        $client->Surname = "Coulter";
        $client->AddressLine1 = "Ballymacoss Avenue";
        $client->Postcode = "BT28 2GU";
        $client->Town = "LISBURN";
        $client->Mobile = "028 9260 5335";
        $client->Telephone = "028 9260 5335";
        $client->Email = "nec.euismod.in@auctornunc.org";
        $client->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Worship Evening";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Rental";
        $expense->ExpenseDetails = "Rental Order To myself";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 1;
        $expense->UnitCost = 500;
        $expense->TotalCharge = 500;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Pack gear";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $task = new Task();
        $task->TaskTitle = "Check venue for internet";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $task = new Task();
        $task->TaskTitle = "Arrange transport";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "QU32 Training";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Create PowerPoint";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $task = new Task();
        $task->TaskTitle = "Arrange Dates";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $quote = new Quote();
        $quote->ClientID = $client->ClientID;
        $quote->DateCreated = new RhubarbDate("Now");
        $quote->ProjectID = $project->ProjectID;
        $quote->save();

		$quoteItem = new QuoteItem();
		$quoteItem->QuoteID = $quote->QuoteID;
		$quoteItem->QuoteItemTitle = "YAMAHA DXS 12 Sub";
		$quoteItem->UnitCost = 18.10;
		$quoteItem->NumberOfUnits = 2;
		$quoteItem->save();

		$quoteItem = new QuoteItem();
		$quoteItem->QuoteID = $quote->QuoteID;
		$quoteItem->QuoteItemTitle = "YAMAHA DBR10 Speaker";
		$quoteItem->UnitCost = 10;
		$quoteItem->NumberOfUnits = 2;
		$quoteItem->save();

		$quoteItem = new QuoteItem();
		$quoteItem->QuoteID = $quote->QuoteID;
		$quoteItem->QuoteItemTitle = "K&M 21366 Sat Pole";
		$quoteItem->UnitCost = 0;
		$quoteItem->NumberOfUnits = 2;
		$quoteItem->save();

		$quoteItem = new QuoteItem();
		$quoteItem->QuoteID = $quote->QuoteID;
		$quoteItem->QuoteItemTitle = "RGB Flood Light";
		$quoteItem->UnitCost = 4;
		$quoteItem->NumberOfUnits = 2;
		$quoteItem->save();

		$quoteItem = new QuoteItem();
		$quoteItem->QuoteID = $quote->QuoteID;
		$quoteItem->QuoteItemTitle = "DrumKit6 Drum Micriphone Kit";
		$quoteItem->UnitCost = 12;
		$quoteItem->NumberOfUnits = 1;
		$quoteItem->save();

		$quoteItem = new QuoteItem();
		$quoteItem->QuoteID = $quote->QuoteID;
		$quoteItem->QuoteItemTitle = "QU32 LEDlamp";
		$quoteItem->UnitCost = 1.3;
		$quoteItem->NumberOfUnits = 2;
		$quoteItem->save();

		$quoteItem = new QuoteItem();
		$quoteItem->QuoteID = $quote->QuoteID;
		$quoteItem->QuoteItemTitle = "Eurolight DMX Move Control 512";
		$quoteItem->UnitCost = 4.2;
		$quoteItem->NumberOfUnits = 1;
		$quoteItem->save();

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

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "CD";
        $expense->ExpenseDetails = "Had to buy a cd to give to them after the event";
		$expense->Date = new RhubarbDate("now");
        $expense->NumberOfUnits = 1;
        $expense->UnitCost = 2;
        $expense->TotalCharge = 2;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Rental";
        $expense->ExpenseDetails = "Equipment Rental to myself";
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->NumberOfUnits = 1;
        $expense->UnitCost = 1000;
        $expense->TotalCharge = 1000;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Check for internet in field";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "12th 2016";
        $project->save();

        $task = new Task();
        $task->TaskTitle = "Check for internet in field";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
        $expense->NumberOfUnits = 3;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "CD";
        $expense->ExpenseDetails = "Had to burn 2 copies of the cd";
        $expense->NumberOfUnits = 2;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 2;
        $expense->TotalCharge = 4;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Rental";
        $expense->ExpenseDetails = "Equipment Rental to myself";
        $expense->NumberOfUnits = 1;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 1000;
        $expense->TotalCharge = 1000;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Check for internet in field";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "11th Day Tent Band 2016";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
        $expense->NumberOfUnits = 3;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "CD";
        $expense->ExpenseDetails = "Had to burn 2 copies of the cd";
        $expense->NumberOfUnits = 2;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 2;
        $expense->TotalCharge = 4;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Check for internet in tent";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Christmas Presenter Training";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
        $expense->NumberOfUnits = 3;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Arrange date for training";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "Plugging in ethernet cable";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
        $expense->NumberOfUnits = 3;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Plug in the cable";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $task = new Task();
        $task->TaskTitle = "Contemplate stupidity of the human race";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = "GTFO Training";
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Time";
        $expense->ExpenseDetails = "Time taken to ...";
        $expense->NumberOfUnits = 3;
		$expense->Date = new RhubarbDate("now");
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $task = new Task();
        $task->TaskTitle = "Arrange date for training";
        $task->TaskDescription;
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        $task = new Task();
        $task->TaskTitle = "Kiss that moustache goodbye forever!";
        $task->TaskDescription = "See you know who...";
        $task->Completed = true;
        $task->ProjectID = $project->ProjectID;
        $task->save();

        /*
         * Projects that don't have a client
         */
        $project = new Project();
        $project->ProjectName = "No clients, woo!";
        $project->save();
    }

    public function SeedExpenses()
    {
        $expense = new Expense();
        $expense->ExpenseTitle = "PC";
        $expense->ExpenseDetails = "New Pc with better graphics card to render videos faster";
        $expense->Date = new RhubarbDate("now");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $expense = new Expense();
        $expense->ExpenseTitle = "MacBookPro 2017 17\"";
        $expense->ExpenseDetails = "Because who needs USB 3";
        $expense->NumberOfUnits = 3;
		$expense->Date = new RhubarbDate("2 days ago");
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $expense = new Expense();
        $expense->ExpenseTitle = "iPhone";
        $expense->ExpenseDetails = "Baaaaaa";
        $expense->NumberOfUnits = 3;
		$expense->Date = new RhubarbDate("3 days ago");
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $expense = new Expense();
        $expense->ExpenseTitle = "Car";
        $expense->ExpenseDetails = "Brum brum";
		$expense->Date = new RhubarbDate("4 days ago");
        $expense->NumberOfUnits = 3;
        $expense->UnitCost = 15.0;
        $expense->TotalCharge = 45;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();
    }

    public function SeedTasks()
    {
        $task = new Task();
        $task->TaskTitle = "Put new bar codes on";
        $task->TaskDescription;
        $task->Completed = false;
        $task->save();

        $task = new Task();
        $task->TaskTitle = "Phone yer man back";
        $task->TaskDescription;
        $task->Completed = false;
        $task->save();

        $task = new Task();
        $task->TaskTitle = "Tick this box";
        $task->TaskDescription = "lol, every time you seed data this will be unticked xD";
        $task->Completed = false;
        $task->save();
    }

    private function SeedQuotes()
    {
        // One
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

        $project = new Project();
        $project->ProjectName = "Quotable Project";
        $project->ClientID = $client->ClientID;
        $project->save();

        $quote = new Quote();
        $quote->ProjectID = $project->ProjectID;
        $quote->ClientID = $client->ClientID;
        $quote->DateCreated = new RhubarbDate("now");
        $quote->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "XLRs";
        $quoteItem->NumberOfUnits = 3;
        $quoteItem->UnitCost =  23;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Qu32";
        $quoteItem->NumberOfUnits = 1;
        $quoteItem->UnitCost =  2046;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Something else";
        $quoteItem->NumberOfUnits = 7;
        $quoteItem->UnitCost =  2.4;
        $quoteItem->save();

        // Two
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

        $project = new Project();
        $project->ProjectName = "Second Quotable Project";
        $project->ClientID = $client->ClientID;
        $project->save();

        $quote = new Quote();
        $quote->ProjectID = $project->ProjectID;
        $quote->ClientID = $client->ClientID;
        $quote->DateCreated = new RhubarbDate("yesterday");
        $quote->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Time";
        $quoteItem->NumberOfUnits = 3;
        $quoteItem->UnitCost = 10;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Stairville Light";
        $quoteItem->NumberOfUnits = 3;
        $quoteItem->UnitCost =  7;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Something else";
        $quoteItem->NumberOfUnits = 3;
        $quoteItem->UnitCost =  2.4;
        $quoteItem->save();

        // Three
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

        $project = new Project();
        $project->ProjectName = "Sound Upgrade 2016";
        $project->ClientID = $client->ClientID;
        $project->save();

        $quote = new Quote();
        $quote->ProjectID = $project->ProjectID;
        $quote->ClientID = $client->ClientID;
        $quote->DateCreated = new RhubarbDate("1 week ago");
        $quote->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Cromo 8\"";
        $quoteItem->NumberOfUnits = 2;
        $quoteItem->UnitCost = 250;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Qu32";
        $quoteItem->NumberOfUnits = 1;
        $quoteItem->UnitCost =  3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost =  10.50;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Cromo 8\"";
        $quoteItem->NumberOfUnits = 2;
        $quoteItem->UnitCost = 250;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Qu32";
        $quoteItem->NumberOfUnits = 1;
        $quoteItem->UnitCost =  3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost =  10.50;
        $quoteItem->save();
        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Cromo 8\"";
        $quoteItem->NumberOfUnits = 2;
        $quoteItem->UnitCost = 250;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Qu32";
        $quoteItem->NumberOfUnits = 1;
        $quoteItem->UnitCost =  3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost =  10.50;
        $quoteItem->save();
        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Cromo 8\"";
        $quoteItem->NumberOfUnits = 2;
        $quoteItem->UnitCost = 250;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Qu32";
        $quoteItem->NumberOfUnits = 1;
        $quoteItem->UnitCost =  3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost =  10.50;
        $quoteItem->save();
        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Cromo 8\"";
        $quoteItem->NumberOfUnits = 2;
        $quoteItem->UnitCost = 250;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Qu32";
        $quoteItem->NumberOfUnits = 1;
        $quoteItem->UnitCost =  3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost =  10.50;
        $quoteItem->save();
        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Cromo 8\"";
        $quoteItem->NumberOfUnits = 2;
        $quoteItem->UnitCost = 250;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Qu32";
        $quoteItem->NumberOfUnits = 1;
        $quoteItem->UnitCost =  3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost =  10.50;
        $quoteItem->save();

    }
}