<?php

namespace HexTechnology\Leaves\Times;

use HexTechnology\Layouts\HexTechnologyItemView;
use Rhubarb\Leaf\Controls\Common\DateTime\Time;

class TimesItemView extends HexTechnologyItemView
{
    // TODO Implement the ability to set a date as well
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ProjectID",
            new Time("StartTime"),
            new Time("EndTime")
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
}