<?php

namespace HexTechnology\Leaves\Assets\Serials;


use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class SerialsItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return SerialsItemView::class;
    }
}