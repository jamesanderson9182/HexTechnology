<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\QuoteItem;
use HexTechnology\Tests\HexTechnologyTestCase;

class QuoteItemTest extends HexTechnologyTestCase
{
    public function testQuoteItemCanHaveAnAmount()
    {
        $quoteItem = new QuoteItem();
        $quoteItem->UnitCost = 5.30;
        $quoteItem->NumberOfUnits = 3;
        $quoteItem->save();

        $this->assertEquals(
            $quoteItem->UnitCost * $quoteItem->NumberOfUnits,
            $quoteItem->Amount,
            "Amount is equal to UnitCost * Number of Units"
        );
    }
}