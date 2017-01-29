<?php

namespace HexTechnology\Leaves\Project\Quotes;

use HexTechnology\Integrations\Documents\QuotePdf;
use HexTechnology\Models\Quote;
use HexTechnology\Models\QuoteItem;
use Rhubarb\Crown\Exceptions\ForceResponseException;
use Rhubarb\Crown\Response\BinaryResponse;
use Rhubarb\Crown\Response\RedirectResponse;
use Rhubarb\Crown\String\StringTools;
use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class QuotesItem extends CrudLeaf
{

    /**
     * @var QuotesItemModel
     */
    protected $model;

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return QuotesItemView::class;
    }

    protected function createModel()
    {
        return new QuotesItemModel();
    }

    protected function onModelCreated()
    {
        parent::onModelCreated();

        $this->model->AddNewQuoteItemEvent->attachHandler(function(){
            if ($this->model->NewQuoteItemTitle != "") {
                $quoteItem = new QuoteItem();
                $quoteItem->QuoteID = $this->model->restModel->UniqueIdentifier;
                $quoteItem->QuoteItemTitle = $this->model->NewQuoteItemTitle;
                $quoteItem->UnitCost = $this->model->NewUnitCost;
                $quoteItem->NumberOfUnits = $this->model->NewNumberOfUnits;
                $quoteItem->save();

            }
            throw new ForceResponseException(new RedirectResponse('.'));
        });

        $this->model->downloadPdfEvent->attachHandler(function () {

            $quotePdf = new QuotePdf();
            /** @var Quote $quote */
            $quote = $this->model->restModel;
            $file = tempnam("data/temp", 'pdf');
            $quotePdf->toPdfFile($file, $quote);
            rename($file, $file . ".pdf");
            $download = file_get_contents($file . ".pdf");
            unlink($file . "Thank You Donation Letters.pdf");
            throw new ForceResponseException(new BinaryResponse($this, $download, "application/pdf", "Quote".$quote->Client->ClientDisplayName .$quote->DateCreated  . ".pdf"));
        });
    }

}