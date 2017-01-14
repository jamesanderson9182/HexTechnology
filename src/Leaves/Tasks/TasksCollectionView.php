<?php

namespace HexTechnology\Leaves\Tasks;

use HexTechnology\Models\Task;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Leaf\Table\Leaves\Table;

class TasksCollectionView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            $table = new Table(Task::all())
        );

        $table->columns = [
            "TaskTitle",
            "Completed",
            "Project",
            "TaskDescription",
            "" => "<a href='{TaskID}/'>view</a>"
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