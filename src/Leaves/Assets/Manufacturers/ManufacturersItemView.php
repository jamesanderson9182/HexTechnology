<?php

namespace HexTechnology\Leaves\Assets\Manufacturers;


use HexTechnology\Models\Asset;
use HexTechnology\Models\Manufacturer;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Stem\Aggregates\Count;
use Rhubarb\Stem\Filters\Equals;

class ManufacturersItemView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ManufacturerName"
        );
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var Manufacturer $manufacturer */
        $manufacturer = $this->model->restModel;
        ?>
        <h1 class="title">Manufacturer: <?= $manufacturer->ManufacturerName ?></h1>
        <div class="item">
        <?php
        print $this->leaves["ManufacturerName"] . "<br>";
        print $this->leaves["Save"];
        print $this->leaves["Cancel"];
        print $this->leaves["Delete"];
        print "</div>"; // closing div for item
    }

}