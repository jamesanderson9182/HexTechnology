<?php

namespace HexTechnology\Leaves\Assets;


use HexTechnology\Models\Asset;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Stem\Filters\Equals;

class AssetsItemView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
         new TextBox("AssetName")
        );
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        $asset = $this->model->restModel;
        $serialNumbers = SerialNumber::find(
            new Equals("AssetID", $asset->AssetID)
        );
        print $this->leaves["AssetName"];
        /** @var Asset $asset */
    foreach ($serialNumbers as $serialNumber) {
        print $serialNumber->SerialNumberCode . "<br>";
    }
    print $this->leaves["Save"];
    print $this->leaves["Cancel"];
    print $this->leaves["Delete"];
    }

}