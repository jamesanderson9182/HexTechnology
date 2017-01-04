<?php

namespace HexTechnology\Leaves\Assets;


use HexTechnology\Models\Asset;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Controls\Common\SelectionControls\DropDown\DropDown;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Stem\Filters\Equals;

class AssetsItemView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
         "AssetName",
         "RentalCostPerDay",
         "AssetType",
         "Description",
         "RentalCostPerDay",
        "RentalCostPerWeek"
        );
    }



    protected function printViewContent()
    {
        parent::printViewContent();
        $asset = $this->model->restModel;
        $serialNumbers = SerialNumber::find(
            new Equals("AssetID", $asset->AssetID)
        );
        print "<p>AssetName</p>" . $this->leaves["AssetName"];
        print "<p>RentalCostPerDay</p>" . $this->leaves["RentalCostPerDay"];
        print "<p>AssetType</p>" . $this->leaves["AssetType"];
        print "<p>Description</p>" . $this->leaves["Description"];
        print "<p>RentalCostPerDay</p>" . $this->leaves["RentalCostPerDay"];
        print "<p>RentalCostPerWeek</p>" . $this->leaves["RentalCostPerWeek"];

        print "<p>Count of serial numbers: " . sizeof($serialNumbers). "</p>";
        /** @var Asset $asset */
    foreach ($serialNumbers as $serialNumber) {
        print<<<HTML
        <div class="asset-serial" id="{$asset->AssetID}">
        <div class="asset-serial-code">Serial Code: {$serialNumber->SerialNumberCode}</div>
        <div class="asset-serial-initial">Initial Value: £{$serialNumber->InitialValue}</div>
        <div class="asset-serial-current">Current Value: £{$serialNumber->CurrentValue}</div>
        <div class="asset-serial-location">Current Location: </div>
        </div>
HTML;
    }
    print $this->leaves["Save"];
    print $this->leaves["Cancel"];
    print $this->leaves["Delete"];
    }

}