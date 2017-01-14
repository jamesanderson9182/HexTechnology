<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Models\Project;
use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Leaf\Table\Leaves\Table;

class ProjectCollectionView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            $table = new Table(Project::all())
        );
        $table->columns = [
            "ProjectID",
            "ProjectName",
            "ClientID"
        ];

    }

    protected function printViewContent()
    {
        parent::printViewContent();
        print "<h1 class='title'>" . $this->getTitle() . "</h1>";
        print "<div class='collection-table'>";
        print $this->leaves["Table"];
        print "</div>";
    }

}