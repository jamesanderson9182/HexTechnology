<?php

namespace HexTechnology\Leaves\Project\Quotes;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Quote;

class QuotesItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->registerSubLeaf(
            "ClientID",
            "DateCreated"
        );
    }

    protected function printInnerContent()
    {
        /** @var Quote $quote */
        $quote = $this->model->restModel;
        $this->layoutItemsWithContainer("Quote",
            [
                "ClientID",
                "DateCreated"
            ]
        );
        print "Grand Total: £" . $quote->GrandTotal;
    }

}