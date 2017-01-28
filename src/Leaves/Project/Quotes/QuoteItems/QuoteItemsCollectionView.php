<?php

namespace HexTechnology\Leaves\Project\Quotes\QuoteItems;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use Rhubarb\Leaf\Table\Leaves\Table;

class QuoteItemsCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];
        $table->setCollection($this->model->restCollection);
        $table->columns = [
            "" => '<a href="{QuoteItemID}/">view</a>'
        ];
    }

}