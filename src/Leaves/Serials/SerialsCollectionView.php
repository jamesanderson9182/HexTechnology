<?php
namespace HexTechnology\Leaves\Serials;
use HexTechnology\Models\Asset;
use HexTechnology\Models\SerialNumber;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Stem\Filters\Equals;

/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 04/01/2017
 * Time: 19:42
 */
class SerialsCollectionView extends CrudView
{
    protected function printViewContent()
    {
        parent::printViewContent();
        print "<a href='add/'>Add</a>";

        $serials = SerialNumber::all();
        /** @var SerialNumber $serial */
        foreach ($serials as $serial)
        {
            print "<p>ASSET: " .$serial->Asset->AssetName . "</p>";
            print "<p>SerialNumber:  <a href='$serial->SerialNumberID/'>" . $serial->SerialNumberCode . "</a></p>";
        }
    }
}