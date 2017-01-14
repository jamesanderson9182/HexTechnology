<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 05/01/2017
 * Time: 21:22
 */

namespace HexTechnology\Leaves\Assets\Manufacturers;


use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class ManufacturersItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return ManufacturersItemView::class;
    }
}