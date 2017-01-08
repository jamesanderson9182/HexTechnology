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
        $assets = Asset::all()->joinWith(AssetType::all(), "AssetTypeID", "AssetTypeID", ["AssetTypeName"]);
        $totalAssets = SerialNumber::all()->count();
        print "<h1 class='title'>Assets</h1>";
        print "<div class='collection-table'>";
        print "<a href='add/' class='button-add'>Add</a>";
        if (sizeof($assets) > 0) {
            print<<<HTML
<script src="/static/js/sortable.js"></script>
<table class="sortable">
    <thead>
        <td>Asset Name</td>
        <td>Rental Cost Per Day</td>
        <td>Rental Cost Per Week</td>
        <td>Asset Type</td>
        <td>Max Power Rating</td>
        <td>Manufacturer</td>
        <td>Model</td>
        <td>Number Owned ({$totalAssets})</td>
    </thead>
HTML;
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
HTML;


            }
        }
        print "</table>";
        print "</div>";//Closing collection table div
    }

}