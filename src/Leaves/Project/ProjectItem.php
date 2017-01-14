<?php

namespace HexTechnology\Leaves\Project;

use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class ProjectItem extends CrudLeaf
{

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return ProjectItemView::class;
    }
}