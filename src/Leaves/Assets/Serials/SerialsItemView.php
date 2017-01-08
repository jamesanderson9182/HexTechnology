<?php

namespace HexTechnology\Leaves\Assets\Serials;


use HexTechnology\Models\Asset;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Crud\Leaves\CrudView;

class SerialsItemView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "SerialNumberCode",
            "InitialValue",
            "CurrentValue",
            "PurchaseDate",
            "AssetID"
        );
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var SerialNumber $serialNumber */
        $serialNumber = $this->model->restModel;
        $dateAdded = date("F jS, Y", $serialNumber->DateAddedToSystem->getTimestamp() );
        $title = "Serial Number: $serialNumber->SerialNumberCode";
        if(!$this->model->restModel->isNewRecord()){
            $title .= " for Asset: $serialNumber->Asset->AssetName";
        }
        ?>
        <h1 class="title"><?= $title ?></h1>
        <div class="item">
        <p>Serial Number</p>
        <?= $this->leaves["SerialNumberCode"]?>
        <p>Initial Cost</p>
        <?= $this->leaves["InitialValue"] ?>
        <p>Current Value</p>
        <?= $this->leaves["CurrentValue"] ?>
        <p>Asset <a href="/assets/add/">(add)</a></p>
        <?= $this->leaves["AssetID"] ?>
        <p>PurchaseDate</p>
        <?= $this->leaves["PurchaseDate"] ?>
        <?php

        if(!$this->model->restModel->isNewRecord()){
           print "<p>Date Added To System: $dateAdded</p>";
        }

        print $this->leaves["Save"];
        print $this->leaves["Delete"];
        print $this->leaves["Cancel"];
        print "</div>";//closing item div
    }

}