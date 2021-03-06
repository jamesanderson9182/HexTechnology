<?php

namespace HexTechnology\Leaves\Assets\Manufacturers;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class ManufacturersCollection extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return ManufacturersCollectionView::class;
    }
}