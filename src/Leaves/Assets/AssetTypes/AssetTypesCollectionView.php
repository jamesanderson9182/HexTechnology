<?php

namespace HexTechnology\Leaves\Assets\AssetTypes;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use HexTechnology\Models\AssetType;
use Rhubarb\Leaf\Table\Leaves\Table;

class AssetTypesCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];

        $table->setCollection(AssetType::all());

        $table->columns = [
            "" => "<a href='{AssetTypeID}/'>view</a>",
            "AssetTypeName"
        ];
    }

}