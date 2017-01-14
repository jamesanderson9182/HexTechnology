<?php

namespace HexTechnology\Layouts;

use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Leaf\Table\Leaves\Table;

class HexTechnologyCollectionTableView extends CrudView
{
    /**
     * You will need to override this, see the following sample. Note the backslash is just for this comment
     * /** @var Table $table *\/
     * $table = $this->leaves["Table"];
     * $table->setCollection(ModelName::all());
     * $table->columns[] = [
     *      "column1",
     *      "column2"
     * ];
     */
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            $table = new Table()
        );
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        ?>
        <h1 class='title'><?= $this->getTitle() ?> </h1>
        <div class='collection-table'>
            <a href='add/' class='button-add'>Add</a>
        <?php
        $this->printAboveTable();

        print $this->leaves["Table"];

        $this->printBelowTable();

        print "</div>";
    }

    /**
     * Override this to print above the table
     */
    protected function printAboveTable()
    {
    }

    private function printBelowTable()
    {
    }

}