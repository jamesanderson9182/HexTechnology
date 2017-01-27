<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Project;
use HexTechnology\Models\Quote;
use HexTechnology\Models\QuoteItem;
use HexTechnology\Tests\HexTechnologyTestCase;

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

}