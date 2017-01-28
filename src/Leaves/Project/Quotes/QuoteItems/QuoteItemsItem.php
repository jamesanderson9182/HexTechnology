<?php

namespace HexTechnology\Leaves\Project\Quotes\QuoteItems;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class QuoteItemsItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return QuoteItemsItemView::class;
    }
}