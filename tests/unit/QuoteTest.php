<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Client;
use HexTechnology\Models\Project;
use HexTechnology\Models\Quote;
use HexTechnology\Models\QuoteItem;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Crown\DateTime\RhubarbDate;

class QuoteTest extends HexTechnologyTestCase
{
    public function testModelExists()
    {
        $quote = new Quote();
        $quote->save();
    }

    public function testCanHaveProject()
    {
        $project = new Project();
        $project->save();

        $quote = new Quote();
        $quote->ProjectID = $project->ProjectID;
        $quote->save();

        $testQuote = Quote::findFirst();

        $this->assertEquals($project->ProjectID, $testQuote->Project->ProjectID, "A quote can be for a project");
    }

    public function testQuoteCanHaveManyQuoteItems()
    {
        $quote = new Quote();
        $quote->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->save();

        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->save();

        $this->assertEquals(3, sizeof($quote->QuoteItems), "A quote can have many quote items");
    }

    public function testQuoteCanHaveAGrandTotal()
    {
        $totals = 0;

        $quote = new Quote();
        $quote->save();

        $quoteItem = new QuoteItem();
        $quoteItem->NumberOfUnits = 7;
        $quoteItem->UnitCost = 1.4;
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->save();

        $totals += $quoteItem->Amount;

        $quoteItem = new QuoteItem();
        $quoteItem->NumberOfUnits = 9;
        $quoteItem->UnitCost = 7;
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->save();

        $totals += $quoteItem->Amount;

        $quoteItem = new QuoteItem();
        $quoteItem->NumberOfUnits = 99;
        $quoteItem->UnitCost = 1.2;
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->save();

        $totals += $quoteItem->Amount;

        $quoteItem = new QuoteItem();
        $quoteItem->NumberOfUnits = 2;
        $quoteItem->UnitCost = 3500.99;
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->save();

        $totals += $quoteItem->Amount;

        $this->assertEquals($totals, $quote->GrandTotal, "Grand Total is the sum of all of the QuoteItem Amounts");
    }

    public function testCanHaveClient()
    {
        $client = new Client();
        $client->save();

        $quote = new Quote();
        $quote->ClientID = $client->ClientID;
        $quote->save();

        $this->assertEquals($client->ClientID, $quote->Client->ClientID, "A quote can have a client");
    }

}