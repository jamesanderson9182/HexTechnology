<?php

namespace HexTechnology\Leaves\Assets\AssetTypes;

use HexTechnology\Models\AssetType;
use Rhubarb\Leaf\Crud\Leaves\CrudView;

class AssetTypesItemView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
          "AssetTypeName"
        );
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var AssetType $assetType */
        $assetType = $this->model->restModel;
        ?>
        <h1 class="title">Asset Type: <?= $assetType->AssetTypeName ?></h1>
        <div class="item">
        <?php
        print $this->leaves["AssetTypeName"] . "<br>";
        print $this->leaves["Save"];
        print $this->leaves["Delete"];
        print $this->leaves["Cancel"];

        print "<h2>Items With This Type</h2>";
        if (sizeof($assetType->Assets) >0 )
        {
            print "<ul>";
            foreach ($assetType->Assets as $asset){
                print "<li><a href='/assets/$asset->AssetID/'>$asset->AssetName</a></li>";
        }
            print "</ul>";
        }
        print "</div>";
    }

}