<?php

namespace HexTechnology\Leaves\Assets\AssetTypes;

use HexTechnology\Models\AssetType;
use Rhubarb\Leaf\Crud\Leaves\CrudView;

class AssetTypesCollectionView extends CrudView
{
    protected function printViewContent()
    {
        parent::printViewContent();
        print "<a href='add/' class='button-add'>Add</a>";
        $assetTypes = AssetType::all();
        foreach ($assetTypes as $assetType) {
            print "<a href='$assetType->AssetTypeID/' class='asset-type-link'>$assetType->AssetTypeName</a> <br>";
        }
    }

}