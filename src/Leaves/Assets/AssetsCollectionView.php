<?php

namespace HexTechnology\Leaves\Assets;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use HexTechnology\Models\Asset;
use Rhubarb\Leaf\Table\Leaves\Table;

class AssetsCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];

        $table->setCollection(Asset::all());

        $table->columns = [
            "" => "<a href='{AssetID}/'>view</a>",
            "AssetName",
            "RentalCostPerDay",
            "RentalCostPerWeek",
            "AssetType",
            "MaxPowerRating",
            "Model",
        ];
    }
}