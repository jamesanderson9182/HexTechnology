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
            $table = new Table($this->model->restCollection)
        );

        $table->setNoDataHtml("<p class='empty-table'>Woah there tiger! You have no ". $this->getTitle() .". Go ahead and add one.</p>");
    }

    /**
     * This is final so that no subclasses can override it
     */
    final function printViewContent()
    {
        parent::printViewContent();
        ?>
        <h1 class='title'><?= $this->getTitle() ?> </h1>
        <div class='collection-table'>
            <a href='add/' class='button-add'>Add</a>
        <?php
        $this->printAboveTable();

        print "<div' class='table-centered overflow-auto'>";
        print "<div>";
        print $this->leaves["Table"];
        print "</div>";
        print "</div>";

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