<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Expense;
use Rhubarb\Leaf\Table\Leaves\Table;
use Rhubarb\Stem\Filters\Equals;

class ProjectItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $relatedExpenses = Expense::find(new Equals("ProjectID", $this->model->restModel->UniqueIdentifier));

        $this->registerSubLeaf(
            "ProjectID",
            "ProjectName",
            "ClientID",
            $expenses = new Table($relatedExpenses, 50, "ExpensesTable")
        );

        $expenses->columns =
            [
                "" => "<a href='/expenses/{ExpenseID}/'>view</a>",
                "ExpenseTitle",
                "NumberOfUnits",
                "UnitCost",
                "TotalCharge",
                "ExpenseType"
            ];
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("",
            [
                "ProjectID",
                "ProjectName",
                "ClientID"
            ]);
        print "<h2>Related Expenses</h2>";
        print $this->leaves["ExpensesTable"];
    }
}

