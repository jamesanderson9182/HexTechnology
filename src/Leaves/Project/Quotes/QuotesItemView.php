<?php

namespace HexTechnology\Leaves\Project\Quotes;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Asset;
use HexTechnology\Models\Quote;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Text\NumericTextBox;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Table\Leaves\Table;

class QuotesItemView extends HexTechnologyItemView
{
    /**
     * @var QuotesItemModel
     */
    protected $model;

    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Quote $quote */
        $quote = $this->model->restModel;

        $this->registerSubLeaf(
            "ClientID",
            "DateCreated",
            $assetTable = new Table(Asset::all(), 50, "AssetTable"),
            $quoteItemTable = new Table($quote->QuoteItems, 50, "QuoteItemTable"),
            //adding quote items
            new TextBox("NewQuoteItemTitle"),
            new NumericTextBox("NewUnitCost"),
            new NumericTextBox("NewNumberOfUnits"),
            new Button("NewQuoteItem", "+", function() {
                $this->model->AddNewQuoteItemEvent->raise();
            }),
            new Button("PDF", "Download Pdf", function () {
                $this->model->downloadPdfEvent->raise();
            })
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
        if($this->model->restModel->isNewRecord() == false)
        {
			print "Grand Total: £" . $quote->GrandTotal;
			print $this->leaves["QuoteItemTable"];
			print $this->leaves["PDF"];
			$this->layoutItemsWithContainer("New Quote Item",
				[
					"NewQuoteItemTitle",
					"NewUnitCost",
					"NewNumberOfUnits",
					"NewQuoteItem"
				]);

			print $this->leaves["AssetTable"];
        }
    }

}