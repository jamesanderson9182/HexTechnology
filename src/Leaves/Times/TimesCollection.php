<?php

namespace HexTechnology\Leaves\Times;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class TimesCollection extends CrudLeaf
{
    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return TimesCollectionView::class;
    }
}