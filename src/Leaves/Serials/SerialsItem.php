<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 04/01/2017
 * Time: 19:47
 */

namespace HexTechnology\Leaves\Serials;


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