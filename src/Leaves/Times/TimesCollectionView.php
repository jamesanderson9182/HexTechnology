<?php

namespace HexTechnology\Leaves\Times;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;

class   TimesCollectionView extends HexTechnologyCollectionTableView
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

}