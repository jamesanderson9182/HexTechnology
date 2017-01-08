<?php
namespace HexTechnology\Leaves\Assets\Serials;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Crud\Leaves\CrudView;

class SerialsCollectionView extends CrudView
{
    protected function printViewContent()
    {
        parent::printViewContent();
        $serials = SerialNumber::all();
        /** @var SerialNumber $serial */

        ?>
        <h1 class="title">Serial Numbers for Assets</h1>
        <div class="collection-table">
        <a href='add/' class='button-add'>Add</a>
        <?php
        if (sizeof($serials)>0)
        {
            ?>
            <script src="/static/js/sortable.js"></script>
            <table class="sortable">
                <thead>
                <td>Serial Number</td>
                <td>Asset Name</td>
                <td>Type</td>
                </thead>
            <?php
            foreach ($serials as $serial)
            {
                ?>
                <tr>
                    <td><a href="<?=$serial->SerialNumberID?>/"><?= $serial->SerialNumberCode ?></a></td>
                    <td><a href="/assets/<?= $serial->Asset->AssetID ?>/"> <?= $serial->Asset->AssetName ?></a></td>
                    <td><a href="/assets/type/<?= $serial->Asset->AssetType->AssetTypeID ?>/"><?= $serial->Asset->AssetType->AssetTypeName ?></a></td>
                </tr>
                <?php
            }
        }

        ?>
        </table>
        </div>
        <?php
    }
}