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

        $this->registerSubLeaf(
            "ProjectID",
            "ProjectName",
            "ClientID",
            $expenses = new Table($this->model->restModel->Expenses, 50, "ExpensesTable"),
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
            new TextBox("NewTaskTitle"),
            new Checkbox("Completed"),
            $taskTable = new Table($this->model->restModel->Tasks, 50, "TasksTable"),
            new Button("NewTaskEvent", "Add Task", function () {
                $this->model->NewTaskEvent->raise();
            })
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

        $taskTable->columns = [
            "" => "<a href='/tasks/{TaskID}'>view</a>",
            "TaskTitle",
            "Completed"
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
                "NewTaskTitle",
                "NewTaskEvent"
            ]
        );
    }
}

