<?php

namespace HexTechnology\Leaves\Assets\Manufacturers;

use HexTechnology\Layouts\HexTechnologyItemView;

class ManufacturersItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ManufacturerName"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("",
            [
                "ManufacturerName"
            ]
        );
    }

}