<?php

namespace HexTechnology\Leaves\Times;

use HexTechnology\Layouts\HexTechnologyItemView;
use Rhubarb\Leaf\Controls\Common\DateTime\Date;

class TimesItemView extends HexTechnologyItemView
{
	protected function createSubLeaves()
	{
		parent::createSubLeaves();
		$this->registerSubLeaf(
			"StartTime",
			"EndTime",
			new Date("StartTime")
		);
	}

	protected function printInnerContent()
	{
		$this->layoutItemsWithContainer( "",
			[
				"StartTime",
				"EndTime"
			]
		);
	}

}