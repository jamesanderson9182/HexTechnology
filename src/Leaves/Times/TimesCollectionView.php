<?php

namespace HexTechnology\Leaves\Times;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
<<<<<<< HEAD
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
=======

class TimesCollectionView extends HexTechnologyCollectionTableView
{
	protected function createSubLeaves()
	{
		parent::createSubLeaves();
		$this->leaves["Table"]->columns = [
			"" => '<a href="{TimeID}/">view</a>',
			"StartTime",
			"EndTime",
			"TotalHours"
		];
	}
>>>>>>> 1e28f5fec01a031446c4ab6fe23d33368acb538c

}