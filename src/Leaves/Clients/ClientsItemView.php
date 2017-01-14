<?php

namespace HexTechnology\Leaves\Clients;

use Rhubarb\Leaf\Crud\Leaves\CrudView;

class ClientsItemView extends CrudView
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

        $this->leaves["Save"]->addCssClassNames("btn btn-success");
        $this->leaves["Cancel"]->addCssClassNames("btn btn-warning");
        $this->leaves["Delete"]->addCssClassNames("btn btn-danger");
    }

    protected function printViewContent()
    {
        print "<h1 class='title'>" . $this->getTitle() . "</h1>";
        print "<div class='item'>";
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
        print "<div class='button-bar'>";
        print $this->leaves["Save"];
        print $this->leaves["Cancel"];
        print $this->leaves["Delete"];
        print "</div>"; // closing button bar div
        print "</div>";
    }

}