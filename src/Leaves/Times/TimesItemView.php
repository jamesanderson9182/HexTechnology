<?php

namespace HexTechnology\Leaves\Times;

use HexTechnology\Layouts\HexTechnologyItemView;
<<<<<<< HEAD

class TimesItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ProjectID",
            "StartTime",
            "EndTime"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer(
            "",
            [
                "ProjectID",
                "StartTime",
                "EndTime"
            ]
        );
    }
=======
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
>>>>>>> 1e28f5fec01a031446c4ab6fe23d33368acb538c

}