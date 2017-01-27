<?php

namespace HexTechnology\Leaves\Project\Quotes;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class QuotesItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return QuotesItemView::class;
    }
}