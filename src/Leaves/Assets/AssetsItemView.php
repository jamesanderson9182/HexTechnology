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
            "AssetTypeID",
            "Description",
            "RentalCostPerDay",
            "RentalCostPerWeek",
            "MaxPowerRating",
            "Model",
            "ManufacturerID"
        );
    }


    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var Asset $asset */
        $asset = $this->model->restModel;
        print "<h1 class='title'>Asset: {$asset->AssetName}</h1>";
        print "<div class='item'>";
        print "<a href='../'>back</a>";
        print "<p>Asset Name</p>" . $this->leaves["AssetName"];
        print "<p>Rental Cost Per Day</p>" . $this->leaves["RentalCostPerDay"];
        print "<p>Asset Type</p>" . $this->leaves["AssetTypeID"];
        print "<p>Description</p>" . $this->leaves["Description"];
        print "<p>Rental Cost Per Day</p>" . $this->leaves["RentalCostPerDay"];
        print "<p>Rental Cost Per Week</p>" . $this->leaves["RentalCostPerWeek"];
        print "<p>Model</p>" . $this->leaves["Model"];
        print "<p>Manufacturer</p>" . $this->leaves["ManufacturerID"];

        print "<br>";
        print "<br>";

        print $this->leaves["Save"];
        print $this->leaves["Cancel"];
        print $this->leaves["Delete"];
        print "</div>"; // closing item div
        /** @var integer $totalSerials */
        $totalSerials = sizeof($asset->SerialNumbers);

        if($totalSerials >0)
        {
            print<<<HTML
            <div style="overflow-x:auto;" class="item-related">
            <p>Count of serial numbers: {$totalSerials}</p>
<table>
    <thead>
        <td>Serial Code</td>                
        <td>Initial Value</td>                
        <td>Current Value</td>                
        <td>Current Location:</td>                        
    </thead>
HTML;

            foreach ($asset->SerialNumbers as $serialNumber) {
                print<<<HTML
    <tr>
        <td><a href="/serials/$serialNumber->SerialNumberID/">{$serialNumber->SerialNumberCode}</a></td>
        <td>£{$serialNumber->InitialValue}</td>
        <td>£{$serialNumber->CurrentValue}</td>
        <td>e.g. warehouse</td>
    </tr>
HTML;
            }
            print "</table></div>";
        }

    }

}