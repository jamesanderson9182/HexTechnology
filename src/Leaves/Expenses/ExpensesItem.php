<?php

namespace HexTechnology\Leaves\Expenses;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class ExpensesItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return ExpensesItemView::class;
    }
}