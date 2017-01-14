<?php

namespace HexTechnology\Leaves\Expenses;

use HexTechnology\Models\Expense;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Leaf\Table\Leaves\Table;

class ExpensesCollectionView extends CrudView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->registerSubLeaf(
           $table =  new Table(Expense::all())
        );

        $table->columns = [
            "View" => "<a href='{ExpenseID}/'>view</a>",
            "ExpenseTitle",
            "Project.ProjectName",
            "ExpenseType",
            "TotalCharge"
        ];
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        print "<h1 class='title'>" . $this->getTitle() . "</h1>";
        print "<div class='collection-table'>";
        print $this->leaves["Table"];
        print "<div>";
    }

}