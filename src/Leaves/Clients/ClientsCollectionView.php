<?php

namespace HexTechnology\Leaves\Clients;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use HexTechnology\Models\Client;
use Rhubarb\Leaf\Table\Leaves\Table;

class ClientsCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];

        $table->setCollection(Client::all());

        $table->columns = [
            "" => "<a href='{ClientID}/'>view</a>",
            "ClientDisplayName",
            "AddressLine1",
            "Postcode",
            "Town",
            "Mobile",
            "Telephone",
            "Email"
        ];
    }

}