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
        $this->leaves["Save"]->addCssClassNames("btn btn-success");
        $this->leaves["Cancel"]->addCssClassNames("btn btn-warning");
        $this->leaves["Delete"]->addCssClassNames("btn btn-danger");
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var AssetType $assetType */
        $assetType = $this->model->restModel;
        ?>
        <h1 class="title">Asset Type: <?= $assetType->AssetTypeName ?></h1>
        <div class="item">
        <span class='btn btn-warning'><img src='/static/images/back.svg' height='13px' style='margin-right:5px; margin-bottom:-1px;'><a href='../'>back</a></span>
        <?php
        print "<p>Asset Type:</p>";
        print $this->leaves["AssetTypeName"] . "<br>";
        print "<div class='button-bar'>";
        print $this->leaves["Save"];
        print $this->leaves["Delete"];
        print $this->leaves["Cancel"];
        print "</div>";

        //TODO put this into a table

        print "<h2>Assets With This Type</h2>";
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