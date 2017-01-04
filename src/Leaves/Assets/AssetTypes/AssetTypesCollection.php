<?php
namespace HexTechnology\Leaves\Assets\AssetTypes;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class AssetTypesCollection extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return AssetTypesCollectionView::class;
    }
}