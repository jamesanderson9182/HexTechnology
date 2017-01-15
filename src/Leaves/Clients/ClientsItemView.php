<?php

namespace HexTechnology\Leaves\Clients;

use HexTechnology\Layouts\HexTechnologyItemView;

class ClientsItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->registerSubLeaf(
            "ClientDisplayName",
            "Forename",
            "Surname",
            "AddressLine1",
            "Postcode",
            "Town",
            "Mobile",
            "Telephone",
            "Email"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("",
            [
                "ClientDisplayName",
                "Forename",
                "Surname",
                "AddressLine1",
                "Postcode",
                "Town",
                "Mobile",
                "Telephone",
                "Email"
            ]);
    }

}