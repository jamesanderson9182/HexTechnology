<?php

namespace HexTechnology\Leaves\Tasks;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use HexTechnology\Models\Task;
use Rhubarb\Leaf\Table\Leaves\Table;

class TasksCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];
        $table->setCollection(Task::all());

        $table->columns =
            [
                "" => "<a href='{UniqueIdentifier}/'>view</a>",
                "TaskTitle",
                "Completed",
                "Project",
                "TaskDescription"
            ];
    }
}