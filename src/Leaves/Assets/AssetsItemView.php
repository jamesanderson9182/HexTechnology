<?php

namespace HexTechnology\Leaves\Assets;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Table\Leaves\Table;
use Rhubarb\Stem\Filters\EndsWith;
use Rhubarb\Stem\Filters\Equals;

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
            $serialNumberPurchaseDate = new TextBox("SerialNumberPurchaseDate"),

            $table = new Table(SerialNumber::find(new Equals("AssetID", $this->model->restModel->UniqueIdentifier)))
        );

        $table->columns = [
            "" => "view",
            "SerialNumberCode",
            "InitialValue",
            "CurrentValue",
            "PurchaseDate",
            "PurchaseDate"
        ];

    }

    protected function printInnerContent()
    {
        print "<div class='multi-column'>";
        print "<div class='column'>";
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

        print "</div>";
        print "<div class='column'>";

        print "<div class='overflow-auto'>";
        print $this->leaves["Table"];
        print "</div>";

        $this->layoutItemsWithContainer( "",
            [
                "Code" => "SerialNumberCode",
                "Init" => "SerialNumberInitialPrice",
                "Val" => "SerialNumberCurrentValue",
                "Date" => "SerialNumberPurchaseDate",
                "AddSerial"
            ]
        );

        print "</div>";
        print "</div>";
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