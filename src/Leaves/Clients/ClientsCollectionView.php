<?php

namespace HexTechnology\Leaves\Clients;

use Rhubarb\Leaf\Crud\Leaves\CrudView;

class ClientsCollectionView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
    }

    protected function printViewContent()
    {
        print "This is the clients collection page!";
    }

}