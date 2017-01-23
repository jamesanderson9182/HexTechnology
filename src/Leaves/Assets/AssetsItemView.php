<?php

namespace HexTechnology\Leaves\Assets;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\DateTime\Date;
use Rhubarb\Leaf\Controls\Common\Text\NumericTextBox;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Table\Leaves\Table;
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
            $serialNumberInitialPrice = new NumericTextBox("SerialNumberInitialPrice", 2),
            $serialNumberCurrentValue = new NumericTextBox("SerialNumberCurrentValue", 2),
            $serialNumberPurchaseDate = new Date("SerialNumberPurchaseDate"),

            $table = new Table(SerialNumber::find(new Equals("AssetID", $this->model->restModel->UniqueIdentifier)))
        );

        $serialNumberInitialPrice->setPlaceholderText("£");
        $serialNumberCurrentValue->setPlaceholderText("£");

        $table->columns = [
            "" => "<a href='/assets/serials/{SerialNumberID}/'>view</a>",
            "SerialNumberCode",
            "InitialValue",
            "CurrentValue",
            "PurchaseDate"
        ];

        $serialNumberPurchaseDate->setYearRange(2010, 2050);

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
                "RentalCostPerDay",
                "RentalCostPerWeek",
                "MaxPowerRating",
                "Model",
                "ManufacturerID",
                "Description",
            ]
        );

        print "</div>";
        print "<div class='column'>";
        if ($this->model->restModel->isNewRecord() == false) {
            print "<div class='overflow-auto'>";
            print $this->leaves["Table"];
            print "</div>";

            $this->layoutItemsWithContainer("",
                [
                    "Serial Number" => "SerialNumberCode",
                    "Initial Value" => "SerialNumberInitialPrice",
                    "Current Value" => "SerialNumberCurrentValue",
                    "Date Purchased" => "SerialNumberPurchaseDate",
                    "AddSerial"
                ]
            );


        }
        print "</div>";
        print "</div>";
    }

}