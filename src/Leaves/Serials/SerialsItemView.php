<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 04/01/2017
 * Time: 19:46
 */

namespace HexTechnology\Leaves\Serials;


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

        ?>
        <h1 class="title">Serial Number: <?= $serialNumber->SerialNumberCode?> for Asset: <?= $serialNumber->Asset->AssetName ?></h1>
        <div class="item">
        <p><a href="/assets/<?= $this->model->restModel->Asset->AssetID ?>/">Asset</a></p>
        <?= $this->leaves["AssetID"] ?>
        <p>Serial Number</p>
        <?= $this->leaves["SerialNumberCode"]?>
        <p>Initial Cost</p>
        <?= $this->leaves["InitialValue"] ?>
        <p>Current Value</p>
        <?= $this->leaves["CurrentValue"] ?>
        <p>Asset</p>
        <?= $this->leaves["AssetID"] ?>
        <p>PurchaseDate</p>
        <?= $this->leaves["PurchaseDate"] ?>
        <p>Date Added To System: <?= $dateAdded ?></p>
        <?php
        print $this->leaves["Save"];
        print $this->leaves["Delete"];
        print $this->leaves["Cancel"];
        print "</div>";//closing item div
    }

}