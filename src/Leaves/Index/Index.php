<?php
namespace HexTechnology\Leaves\Index;

use Rhubarb\Leaf\Leaves\Leaf;
use Rhubarb\Leaf\Leaves\LeafModel;

class Index extends Leaf {

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return IndexView::class;
    }

    /**
     * Should return a class that derives from LeafModel
     *
     * @return LeafModel
     */
    protected function createModel()
    {
        //Normally you would return your own model such as IndexModel.php but seeing as we aren't using it for anything
        // we may as well return the class it is extending
        return new LeafModel();
    }
}