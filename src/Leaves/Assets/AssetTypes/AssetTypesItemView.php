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
        print $this->leaves["AssetTypeName"] . "<br>";
        print $this->leaves["Save"];
        print $this->leaves["Delete"];
        print $this->leaves["Cancel"];

        print "<h2>Items With This Type</h2>";
        /** @var AssetType $assetItem */
        $assetItem = $this->model->restModel;
        if (sizeof($assetItem->Assets) >0 )
        {
            print "<ul>";
            foreach ($assetItem->Assets as $asset){
                print "<li><a href='/assets/$asset->AssetID/'>$asset->AssetName</a></li>";
        }
            print "</ul>";
        }

    }

}