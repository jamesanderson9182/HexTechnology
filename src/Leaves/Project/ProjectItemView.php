<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Layouts\HexTechnologyItemView;

class ProjectItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ProjectID",
            "ProjectName",
            "ClientID"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("",
            [
                "ProjectID",
                "ProjectName",
                "ClientID"
            ]);
    }
}