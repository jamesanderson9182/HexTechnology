<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 04/01/2017
 * Time: 19:46
 */

namespace HexTechnology\Leaves\Serials;


use HexTechnology\Models\Asset;
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
            "AssetID"
        );
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        ?>
        <div class="serial-asset"><a href="/assets/<?= $this->model->restModel->Asset->AssetID ?>/">Asset<?= $this->leaves["AssetID"] ?></a></div>
        <div class="serial-serial-code">Serial Number: <?= $this->leaves["SerialNumberCode"]?></div>
        <div class="serial-serial-initial-value">Initial Cost: <?= $this->leaves["InitialValue"] ?></div>
        <div class="serial-serial-current-value">Current Value: <?= $this->leaves["CurrentValue"] ?></div>
        <?php
        print $this->leaves["Save"];
        print $this->leaves["Delete"];
        print $this->leaves["Cancel"];

    }

}