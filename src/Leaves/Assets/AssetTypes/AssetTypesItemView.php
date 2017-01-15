<?php

namespace HexTechnology\Leaves\Assets\AssetTypes;

use HexTechnology\Layouts\HexTechnologyItemView;

class AssetTypesItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "AssetTypeName"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer(
            "",
            [
                "AssetTypeName"
            ]
        );
    }

}