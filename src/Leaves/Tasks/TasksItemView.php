<?php

namespace HexTechnology\Leaves\Tasks;

use HexTechnology\Layouts\HexTechnologyItemView;

class TasksItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "TaskTitle",
            "TaskDescription",
            "Completed",
            "ProjectID"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("",
            [
                "TaskTitle",
                "TaskDescription",
                "Completed",
                "ProjectID"
            ]);
    }

}