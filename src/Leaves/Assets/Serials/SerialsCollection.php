<?php
namespace HexTechnology\Leaves\Assets\Serials;
use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 04/01/2017
 * Time: 19:41
 */
class SerialsCollection extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return SerialsCollectionView::class;
    }
}