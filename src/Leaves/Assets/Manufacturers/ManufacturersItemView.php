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
        $this->leaves["Save"]->addCssClassNames("btn btn-success");
        $this->leaves["Cancel"]->addCssClassNames("btn btn-warning");
        $this->leaves["Delete"]->addCssClassNames("btn btn-danger");
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var Manufacturer $manufacturer */
        $manufacturer = $this->model->restModel;
        ?>
        <h1 class="title">Manufacturer: <?= $manufacturer->ManufacturerName ?></h1>
        <div class="item">
        <span class='btn btn-warning'><img src='/static/images/back.svg' height='13px' style='margin-right:5px; margin-bottom:-1px;'><a href='../'>back</a></span>
        <p>Manufacturer Name:</p>
        <?php
        print $this->leaves["ManufacturerName"] . "<br>";
        print "<div class='button-bar'>";
        print $this->leaves["Save"];
        print $this->leaves["Cancel"];
        print $this->leaves["Delete"];
        print "</div>";
        if(sizeof($manufacturer->Assets)>0){
            ?>
            </div>
            <div class="item-related">
                <h2>Assets from this manufacturer</h2>
                <ul>
                    <?php
                    foreach ($manufacturer->Assets as $asset)
                    {
                        ?>
                        <li>
                            <a href="/assets/<?= $asset->AssetID ?>/">
                                <?= $asset->AssetName ?></a> (<a href="/assets/types/<?= $asset->AssetTypeID ?>/"><?= $asset->AssetType->AssetTypeName ?></a>)

                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
        }

    }

}