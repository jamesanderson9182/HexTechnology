<?php

namespace HexTechnology\Leaves\Assets;


use Rhubarb\Leaf\Crud\Leaves\CrudView;

class AssetsItemView extends CrudView
{
    protected function printViewContent()
    {
        parent::printViewContent();
        print "This is the asset item view";
        print "<br>";
        print "asset name: " . $this->model->restModel["AssetName"];
    }

}