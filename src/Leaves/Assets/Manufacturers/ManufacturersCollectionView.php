<?php

namespace HexTechnology\Leaves\Assets\Manufacturers;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use HexTechnology\Models\Manufacturer;
use Rhubarb\Leaf\Table\Leaves\Table;

class ManufacturersCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        /** @var Table $table */
        $table = $this->leaves["Table"];

        $table->setCollection(Manufacturer::all());

        $table->columns = [
            "" => "<a href='{ManufacturerID}/'>view</a>",
            "ManufacturerName"
        ];
    }

}