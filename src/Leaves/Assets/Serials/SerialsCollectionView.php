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
        <div class="collection-table" id="myTable">
        <a href='add/' class='button-add'>Add</a>
        <?php
        if (sizeof($serials)>0)
        {
            ?>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Serial Numbers.." class="item-search">
            <script src="/static/js/sortable.js"></script>
            <table class="sortable">
                <tr class="header">
                    <th>Serial Number</th>
                    <th>Asset Name</th>
                    <th>Type</th>
                </tr>
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
//TODO Replace Inline JS with a viewbridge, or put it into its own file and reference it as a <script src="script.js">
        ?>
        </table>
        </div>
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
}