<?php

namespace HexTechnology\Leaves\Expenses;

use HexTechnology\Layouts\HexTechnologyCollectionTableView;
use HexTechnology\Models\Expense;
use Rhubarb\Leaf\Table\Leaves\Table;

class ExpensesCollectionView extends HexTechnologyCollectionTableView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        /** @var Table $table */
        $table = $this->leaves["Table"];

        $table->setCollection(Expense::all());

        $table->columns = [
            "View" => "<a href='{ExpenseID}/'>view</a>",
            "ExpenseTitle",
            "Project.ProjectName",
            "ExpenseType",
            "TotalCharge"
        ];
    }

}