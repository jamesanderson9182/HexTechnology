<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 02/01/2017
 * Time: 20:41
 */

namespace HexTechnology\Leaves\Index;


use Rhubarb\Leaf\Views\View;

class IndexView extends View
{
    protected function printViewContent()
    {
        parent::printViewContent();
        print "Welcome to the home page, can't believe this worked!";
    }

}