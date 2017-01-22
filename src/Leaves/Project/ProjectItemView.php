<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Expense;
use HexTechnology\Models\Project;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Checkbox\Checkbox;
use Rhubarb\Leaf\Controls\Common\SelectionControls\RadioButtons\RadioButtons;
use Rhubarb\Leaf\Controls\Common\Text\NumericTextBox;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Table\Leaves\Table;
use Rhubarb\Stem\Aggregates\Count;
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
            //Expenses
            new TextBox("ExpenseTitle"),
            new NumericTextBox("NumberOfUnits"),
            new NumericTextBox("UnitCost"),
            new NumericTextBox("TotalCharge"),
            $expenseType = new RadioButtons("ExpenseType"),

            // Tasks
            new TextBox("TaskTitle"),
            new Checkbox("Completed"),
            new Table($this->model->restModel->Tasks, 50, "TasksTable")
        );

        $expenseType->setSelectionItems(["Purchase", "Time"]);

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
        /** @var Project $project */
        $project = $this->model->restModel;
        $this->layoutItemsWithContainer("",
            [
                "ProjectID",
                "ProjectName",
                "ClientID"
            ]);
        print "<h2>Related Expenses</h2>";

        print $this->leaves["ExpensesTable"];

        ?>
        <p>Total Expenses: £<?= $project->TotalExpenses ?></p>
        <p>Total Profit: £<?= $project->TotalProfit ?></p>
        <?

        $this->layoutItemsWithContainer("Add a new Expense",
            [
                "ExpenseTitle",
                "NumberOfUnits",
                "UnitCost",
                "TotalCharge",
                "ExpenseType",
                "NewExpenseEvent"
            ]);

        print "<h2>Related Tasks</h2>";

        print $this->leaves["TasksTable"];

        $this->layoutItemsWithContainer("Add a new Task",
            [
                "TaskTitle"
            ]
        );
    }
}

