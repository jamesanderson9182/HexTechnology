<?php

namespace HexTechnology\Leaves\Project\Quotes;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Asset;
use HexTechnology\Models\Quote;
use Rhubarb\Leaf\Table\Leaves\Table;

class QuotesItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->registerSubLeaf(
            "ClientID",
            "DateCreated",
            $assetTable = new Table(Asset::all(), 50, "AssetTable"),
            $quoteItemTable = new Table($this->model->restModel->QuoteItems, 50, "QuoteItemTable")
        );

        $assetTable->columns = [
            "AssetName",
            "RentalCostPerDay",
            "AssetTypeID",
            "RentalCostPerDay",
            "RentalCostPerWeek",
            "NumberOwned"
        ];

        $quoteItemTable->columns = [
            "QuoteItemTitle",
            "UnitCost",
            "NumberOfUnits",
            "Amount"
        ];
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
        print $this->leaves["QuoteItemTable"];

        print $this->leaves["AssetTable"];

        ?>
        <script>
            document.getElementById("copyButton").addEventListener("click", function() {
                document.execCommand("copy");
            });
        </script>
        <?php
    }

}