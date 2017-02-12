<?php

namespace HexTechnology\Leaves\Times;

use HexTechnology\Layouts\HexTechnologyItemView;

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
}