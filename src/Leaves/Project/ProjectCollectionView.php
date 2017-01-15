<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use HexTechnology\Models\Project;
use Rhubarb\Leaf\Table\Leaves\Table;

class ProjectCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];
        $table->setCollection(Project::all());

        $table->columns =
            [
                "" => "<a href='{ProjectID}/'>view</a>",
                "ProjectName",
                "Client"
            ];
    }
}