<?php

namespace HexTechnology\Leaves\Assets;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Asset;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;

class AssetsItemView extends HexTechnologyItemView
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
            $newSerialButton = new Button("AddSerial", "Add Serial", function () {
                $this->model->serialAddedEvent->raise();
            }),
            $serialNumberCode = new TextBox("SerialNumberCode"),
            $serialNumberInitialPrice = new TextBox("SerialNumberInitialPrice"),
            $serialNumberCurrentValue = new TextBox("SerialNumberCurrentValue"),
            $serialNumberPurchaseDate = new TextBox("SerialNumberPurchaseDate")
        );

    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer(
            "",
            [
                "AssetName",
                "RentalCostPerDay",
                "AssetTypeID",
                "Description",
                "RentalCostPerDay",
                "RentalCostPerWeek",
                "MaxPowerRating",
                "Model",
                "ManufacturerID"
            ]
        );
        $asset = $this->model->restModel;
        /** @var integer $totalSerials */
        $totalSerials = sizeof($asset->SerialNumbers);

        if ($totalSerials > 0) {
            ?>
            <div style="overflow-x:auto;" class="item-related">
                <p>Count of serial numbers: <?= $totalSerials ?></p>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Serial Numbers.."
                       class="input-search">
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
                            <td>
                                <a href="/assets/serials/$serialNumber->SerialNumberID/"><?= $serialNumber->SerialNumberCode ?></a>
                            </td>
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
                </table>
            </div>
            <?php
        }
    }

    public function getDeploymentPackage()
    {
        $package = parent::getDeploymentPackage();
        $package->resourcesToDeploy[] = __DIR__ . "/" . $this->getViewBridgeName() . ".js";
        return $package;
    }

    protected function getViewBridgeName()
    {
        return "AssetItemViewBridge";
    }

}