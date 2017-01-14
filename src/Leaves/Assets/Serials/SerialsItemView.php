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
        $this->leaves["Save"]->addCssClassNames("btn btn-success");
        $this->leaves["Cancel"]->addCssClassNames("btn btn-warning");
        $this->leaves["Delete"]->addCssClassNames("btn btn-danger");
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        /** @var SerialNumber $serialNumber */
        $serialNumber = $this->model->restModel;
        $dateAdded = date("F jS, Y", $serialNumber->DateAddedToSystem->getTimestamp() );
        $title = "Serial Number: $serialNumber->SerialNumberCode";
        if(!$this->model->restModel->isNewRecord()){
            $title .= " (for Asset - <a href='/assets/$serialNumber->AssetID/'>$serialNumber->Asset</a>)";
        }
        ?>
        <h1 class="title"><?= $title ?></h1>
        <div class="item">
        <span class='btn btn-warning'><img src='/static/images/back.svg' height='13px' style='margin-right:5px; margin-bottom:-1px;'><a href='../'>back</a></span>
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

        print "<div class='button-bar'>";
        print $this->leaves["Save"];
        print $this->leaves["Delete"];
        print $this->leaves["Cancel"];
        print "</div>";//closing button bar div
        print "</div>";//closing item div
    }

}