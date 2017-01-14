<?php

namespace HexTechnology\Leaves\Project;

use Rhubarb\Leaf\Crud\Leaves\CrudView;

class ProjectItemView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ProjectID",
            "ProjectName",
            "ClientID"
        );

        $this->leaves["Save"]->addCssClassNames("btn btn-success");
        $this->leaves["Cancel"]->addCssClassNames("btn btn-warning");
        $this->leaves["Delete"]->addCssClassNames("btn btn-danger");
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        print "<h1 class='title'>" . $this->getTitle() . "</h1>";
        ?>
        <div class='item'>
            <span class='btn btn-warning'><img src='/static/images/back.svg' height='13px'
                                               style='margin-right:5px; margin-bottom:-1px;'><a
                        href='../'>back</a></span>
        <?php
        $this->layoutItemsWithContainer("",
            [
                "ProjectID",
                "ProjectName",
                "ClientID"
            ]);
        print "<div class='button-bar'>";
        print $this->leaves["Save"];
        print $this->leaves["Cancel"];
        print $this->leaves["Delete"];
        print "</div>"; // closing button bar div
        print "</div>";
    }

}