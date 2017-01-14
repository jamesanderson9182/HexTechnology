<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 02/01/2017
 * Time: 21:50
 */

namespace HexTechnology\Leaves\Assets;


use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Crud\Leaves\CrudView;

class AssetsCollectionView extends CrudView
{
    protected function printViewContent()
    {
        parent::printViewContent();

        // I am doing a join here as I am unable to pull out the types from the asset alone
        //TODO find out if the next few variables are supposed to be in the leaf and therefore unit testable
        $assets = Asset::all()->joinWith(AssetType::all(), "AssetTypeID", "AssetTypeID", ["AssetTypeName"]);
        $totalAssets = SerialNumber::all()->count();
        print "<h1 class='title'>Assets</h1>";
        print "<div class='collection-table'>";
        print "<a href='add/' class='button-add'>Add</a>";
        if (sizeof($assets) > 0) {
            ?>

            <script src="/static/js/sortable.js"></script>
            <br>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Assets.." class="input-search">
<table class="sortable" id="myTable">
    <tr class="header">
        <th>Asset Name</th>
        <th>Rental Cost Per Day</th>
        <th>Rental Cost Per Week</th>
        <th>Asset Type</th>
        <th>Max Power Rating</th>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>Number Owned (<?= $totalAssets ?>)</th>
    </tr>
<?php
            foreach ($assets as $asset) {
                $numberOfEachAsset = count($asset->SerialNumbers);
                print<<<HTML
<tr>     
<td><a href="{$asset->AssetID}/">{$asset->AssetName}</a></td>
<td>{$asset->RentalCostPerDay}</td>
<td>{$asset->RentalCostPerWeek}</td>
<td><a href="/assets/types/{$asset->AssetType->AssetTypeID}/">{$asset->AssetType}</a></td>
<td>{$asset->MaxPowerRating}</td>
<td><a href="/assets/manufacturers/{$asset->Manufacturer->ManufacturerID}/">{$asset->Manufacturer}</a></td>
<td>{$asset->Model}</td>
<td>{$numberOfEachAsset}</td>
</tr>

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
HTML;


            }
        }

        //TODO Put above inline script into a viewbridge
        print "</table>";
        print "</div>";//Closing collection table div
    }

}