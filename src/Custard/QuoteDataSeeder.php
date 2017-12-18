<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Client;
use HexTechnology\Models\Project;
use HexTechnology\Models\Quote;
use HexTechnology\Models\QuoteItem;
use Rhubarb\Crown\DateTime\RhubarbDate;

class QuoteDataSeeder extends SeederUseCase
{
    function seed()
    {
        // One
        $client = $this->clientGenerator(
            "Dan Moore",
            "Dan",
            "Moore",
            "6751 Risus. Road",
            "L9B 7X1",
            "Ways",
            "0800 1111",
            "0894 750 3043",
            "lectus.justo.eu@enimNuncut.net"
        );
        $project = $this->projectGenerator($client, 'Quotable project');
        $quote = $this->quoteGenerator($client, $project);
        $this->quoteItemGenerator(
            $quote,
            "XLRs",
            23,
            3
        );
        $this->quoteItemGenerator(
            $quote,
            "QU32",
            2046,
            1
        );
        $this->quoteItemGenerator(
            $quote,
            "Something else",
            2.4,
            7
        );

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
        $quoteItem->UnitCost = 7;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Something else";
        $quoteItem->NumberOfUnits = 3;
        $quoteItem->UnitCost = 2.4;
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
        $quoteItem->UnitCost = 3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost = 10.50;
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
        $quoteItem->UnitCost = 3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost = 10.50;
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
        $quoteItem->UnitCost = 3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost = 10.50;
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
        $quoteItem->UnitCost = 3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost = 10.50;
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
        $quoteItem->UnitCost = 3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost = 10.50;
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
        $quoteItem->UnitCost = 3024;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = "Training";
        $quoteItem->NumberOfUnits = 4;
        $quoteItem->UnitCost = 10.50;
        $quoteItem->save();
    }
}