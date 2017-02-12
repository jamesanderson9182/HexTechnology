<?php

namespace HexTechnology\Leaves\Times;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use Rhubarb\Leaf\Table\Leaves\Table;

class TimesCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        /** @var Table $table */
        $table = $this->leaves["Table"];
        $table->setCollection($this->model->restCollection);
        $table->columns = [
            "" => "<a href='{TimeID}/'>view</a>",
            "Project.ProjectName",
            "StartTime",
            "EndTime",
            "TotalHours"
        ];
    }

}