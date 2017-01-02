<?php

namespace HexTechnology\Leaves\Assets;


use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class AssetsItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return AssetsItemView::class;
    }
}