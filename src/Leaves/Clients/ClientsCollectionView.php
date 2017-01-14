<?php

namespace HexTechnology\Leaves\Clients;

use HexTechnology\Models\Client;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Leaf\Table\Leaves\Table;

class ClientsCollectionView extends CrudView
{
    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
           $clients = new Table(Client::all(), 50, "Clients")
        );

        $clients->columns = [
            "Display Name" => "<a href='{ClientID}/'>{ClientDisplayName}</a>",
            "Forename",
            "Surname",
            "AddressLine1",
            "Postcode",
            "Town",
            "Mobile",
            "Telephone",
            "Email"
        ];
    }

    protected function printViewContent()
    {
        ?>
        <h1 class="title">Clients</h1>
        <div class='collection-table'>
            <a href='add/' class='button-add'>Add</a>
        <?php
        print $this->leaves["Clients"];
    }

}