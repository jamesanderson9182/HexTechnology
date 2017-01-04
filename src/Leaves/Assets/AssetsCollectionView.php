<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 02/01/2017
 * Time: 21:50
 */

namespace HexTechnology\Leaves\Assets;


use HexTechnology\Models\Asset;
use Rhubarb\Leaf\Crud\Leaves\CrudView;

class AssetsCollectionView extends CrudView
{
    protected function printViewContent()
    {
        parent::printViewContent();

        $assets = Asset::all();
        print "<a href='add/'>Add</a>";
        print "<div>";
        foreach($assets as $asset)
        {
            $numberOfEachAsset = count($asset->SerialNumbers);
            print<<<HTML
<div class="asset" id="{$asset->AssetID}">
<h2><a href="{$asset->AssetID}/">{$asset->AssetName}</a></h2>
<p>Type: {$asset->AssetType}</p>
<p>Rental Cost Per Day: £{$asset->RentalCostPerDay}</p>
<p>Rental Cost Per Week: £{$asset->RentalCostPerWeek}</p>
<p>Number of asset: {$numberOfEachAsset}</p>
</div>
<br>
HTML;
        }
        print "</div>";
    }

}