<?php

namespace HexTechnology\Leaves\Assets\Serials;

use HexTechnology\Layouts\HexTechnologyItemView;

class SerialsItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "SerialNumberCode",
            "InitialValue",
            "CurrentValue",
            "PurchaseDate",
            "AssetID"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("",
            [
                "SerialNumberCode",
                "InitialValue",
                "CurrentValue",
                "PurchaseDate",
                "AssetID",
            ]);
    }

}