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
        ?>
        <h1 class="title">HexTechnology | Making your event work like magic!</h1>
        <?php
    }

}