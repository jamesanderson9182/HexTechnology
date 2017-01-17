<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Expense;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\SelectionControls\RadioButtons\RadioButtons;
use Rhubarb\Leaf\Controls\Common\SelectionControls\SelectionControl;
use Rhubarb\Leaf\Controls\Common\Text\NumericTextBox;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Table\Leaves\Table;
use Rhubarb\Stem\Filters\Equals;

class ProjectItemView extends HexTechnologyItemView
{
    /**
     * @var ProjectItemModel
     */
    protected $model;

    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $relatedExpenses = Expense::find(new Equals("ProjectID", $this->model->restModel->UniqueIdentifier));

        $this->registerSubLeaf(
            "ProjectID",
            "ProjectName",
            "ClientID",
            $expenses = new Table($relatedExpenses, 50, "ExpensesTable"),
            $NewExpenseEvent = new Button("NewExpenseEvent", "Add Expense", function () {
                $this->model->NewExpenseEvent->raise();
            }),
            new TextBox("ExpenseTitle"),
            new NumericTextBox("NumberOfUnits"),
            new NumericTextBox("UnitCost"),
            new NumericTextBox("TotalCharge"),
            $expenseType  = new RadioButtons("ExpenseType")
        );

        $expenseType->setSelectionItems(["Purchase","Time"]);

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
        $this->layoutItemsWithContainer("Add a new Expense",
            [
                "ExpenseTitle",
                "NumberOfUnits",
                "UnitCost",
                "TotalCharge",
                "ExpenseType",
                "NewExpenseEvent"
            ]);
    }
}

