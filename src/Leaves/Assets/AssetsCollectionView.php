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
        print "<div>";
        foreach($assets as $asset)
        {
            print<<<HTML
<div id="{$asset->AssetID}">
<h2><a href="{$asset->AssetID}/">{$asset->AssetName}</a></h2>
<p>Type: {$asset->AssetType}</p>
<p>Current Rental Cost: £{$asset->CurrentRentalCost}</p>
<p>Serial Number: {$asset->SerialNumber}</p>
</div>
<br>
HTML;

        }
        print "</div>";
    }

}