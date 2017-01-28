<?php

namespace HexTechnology\Leaves\Project\Quotes\QuoteItems;

use HexTechnology\Layouts\HexTechnologyItemView;

class QuoteItemsItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->registerSubLeaf(
            "QuoteID",
            "QuoteItemTitle",
            "UnitCost",
            "NumberOfUnits"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("Quote Item",
            [
                "QuoteID",
                "QuoteItemTitle",
                "UnitCost",
                "NumberOfUnits"
            ]
        );
    }

}