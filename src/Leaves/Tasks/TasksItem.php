<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 14/01/2017
 * Time: 20:38
 */

namespace HexTechnology\Leaves\Tasks;


use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class TasksItem extends CrudLeaf {
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
        return TasksItemView::class;
    }
}