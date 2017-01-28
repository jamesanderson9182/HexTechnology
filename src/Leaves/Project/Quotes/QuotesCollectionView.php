<?php

namespace HexTechnology\Leaves\Project\Quotes;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use Rhubarb\Leaf\Table\Leaves\Table;

class QuotesCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];
        $table->setCollection($this->model->restCollection);
        $table->columns = [
            "" => '<a href="{QuoteID}/">view</a>',
            "Client" => "Client",
            "DateCreated",
            "Grand Total (£)" => "GrandTotal"
        ];
    }

}