<?php

namespace HexTechnology\Leaves\Tasks;


use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class TasksCollection extends CrudLeaf {

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return TasksCollectionView::class;
    }
}