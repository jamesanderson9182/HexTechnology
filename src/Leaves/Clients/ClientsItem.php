<?php

namespace HexTechnology\Leaves\Clients;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class ClientsItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return ClientsItemView::class;
    }
}