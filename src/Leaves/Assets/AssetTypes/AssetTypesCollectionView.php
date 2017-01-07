<?php

namespace HexTechnology\Leaves\Assets\AssetTypes;

use HexTechnology\Models\AssetType;
use Rhubarb\Leaf\Crud\Leaves\CrudView;

class AssetTypesCollectionView extends CrudView
{
    protected function printViewContent()
    {
        parent::printViewContent();
        ?>
        <h1 class="title">Asset Types</h1>
        <div class='collection-table'>
        <?php

        print "<a href='add/' class='button-add'>Add</a>";
        $assetTypes = AssetType::all();
        if(sizeof($assetTypes)>0)
        {
            ?>

            <script src="/static/js/sortable.js"></script>
            <table class="sortable">
                <thead>
                    <td>Type</td>
                    <td>Total</td>
                </thead>
            <?php
            foreach ($assetTypes as $assetType) {
                $numberOfType = sizeof($assetType->Assets)
                ?>
                <tr>
                    <td><a href='<?= $assetType->AssetTypeID ?>/' class='asset-type-link'><?= $assetType->AssetTypeName?> </a></td>
                    <td><?= $numberOfType ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
            </div>
                <?php
        }
    }

}