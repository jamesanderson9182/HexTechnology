<?php

namespace HexTechnology\Leaves\Assets;


use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;
use Rhubarb\Leaf\Crud\Leaves\CrudModel;

class AssetsCollection extends CrudLeaf
{
    /**
     * @var CrudModel
     */
    protected $model;

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return AssetsCollectionView::class;
    }

}