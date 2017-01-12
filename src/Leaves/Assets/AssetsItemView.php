<?php

namespace HexTechnology\Leaves\Assets;


use HexTechnology\Models\Asset;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\SelectionControls\DropDown\DropDown;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Stem\Filters\Equals;

class AssetsItemView extends CrudView
{

    /**
     * @var AssetsItemModel
     */
    protected $model;

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
            "ManufacturerID",
            $newSerialButton = new Button("AddSerial", "Add Serial", function(){
                $this->model->serialAddedEvent->raise();
            }),
            $serialNumberCode = new TextBox("SerialNumberCode"),
            $serialNumberInitialPrice = new TextBox("SerialNumberInitialPrice"),
            $serialNumberCurrentValue= new TextBox( "SerialNumberCurrentValue"),
            $serialNumberPurchaseDate = new TextBox("SerialNumberPurchaseDate")
        );

        $this->leaves["Save"]->addCssClassNames("btn btn-success");
        $this->leaves["Cancel"]->addCssClassNames("btn btn-warning");
        $this->leaves["Delete"]->addCssClassNames("btn btn-danger");
    }


    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var Asset $asset */
        $asset = $this->model->restModel;


        print "<h1 class='title'>Asset: {$asset->AssetName}</h1>";
        print "<div class='item'>
               <span class='btn btn-warning'><img src='/static/images/back.svg' height='13px' style='margin-right:5px; margin-bottom:-1px;'><a href='../'>back</a></span>
               <div class='item-two-column'>
               <div class='item-column'>";
        print "<p>Asset Name</p>" . $this->leaves["AssetName"];
        print "<p>Rental Cost Per Day</p>" . $this->leaves["RentalCostPerDay"];
        print "<p>Asset Type <a href='../types/add/'> (add)</a> </p>" . $this->leaves["AssetTypeID"];
        print "<p>Description</p>" . $this->leaves["Description"];
        print "</div>";
        print "<div class='item-column'>";
        print "<p>Rental Cost Per Day</p>" . $this->leaves["RentalCostPerDay"];
        print "<p>Rental Cost Per Week</p>" . $this->leaves["RentalCostPerWeek"];
        print "<p>Model</p>" . $this->leaves["Model"];
        print "<p>Manufacturer <a href='../manufacturers/add/'> (add)</a></p>" . $this->leaves["ManufacturerID"];
        print "</div>";
        print "</div>";

        print "<br>";
        print "<br>";

        print "<div class='button-bar'>";
        print $this->leaves["Save"];
        print $this->leaves["Cancel"];
        print $this->leaves["Delete"];
        print "</div>"; // closing button bar div

        print "</div>"; // closing item div
        /** @var integer $totalSerials */
        $totalSerials = sizeof($asset->SerialNumbers);

        if($totalSerials >0)
        {
            ?>
            <div style="overflow-x:auto;" class="item-related">
            <p>Count of serial numbers: <?= $totalSerials ?></p>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Serial Numbers.." class="input-search">
<table id="myTable">
    <tr class="header">
        <th>Serial Code</th>
        <th>Initial Value</th>
        <th>Current Value</th>
        <th>Current Location:</th>
    </tr>
            <?php

            foreach ($asset->SerialNumbers as $serialNumber) {
                ?>
    <tr>
        <td><a href="/assets/serials/$serialNumber->SerialNumberID/"><?= $serialNumber->SerialNumberCode ?></a></td>
        <td>£<?= $serialNumber->InitialValue ?></td>
        <td>£<?= $serialNumber->CurrentValue ?></td>
        <td>e.g. warehouse</td>
    </tr>
                <?php
            }
            ?>
    <tr>
        <td><?= $this->leaves["SerialNumberCode"] ?><?= $this->leaves["AddSerial"] ?></td>
        <td><?= $this->leaves["SerialNumberInitialPrice"] ?></td>
        <td><?= $this->leaves["SerialNumberCurrentValue"] ?></td>
        <td><?= $this->leaves["SerialNumberPurchaseDate"] ?></td>
    </tr>
            </table></div>
            <script>
                function myFunction() {
                    // Declare variables
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>
            <?php
        }
        //TODO Replace inline JS with a ViewBridge

    }

	public function getDeploymentPackage()
	{
		$package =  parent::getDeploymentPackage();
		$package->resourcesToDeploy[] = __DIR__ . "/". $this->getViewBridgeName() . ".js";
		return $package;
	}

	protected function getViewBridgeName()
	{
		return "AssetItemViewBridge";
	}

}