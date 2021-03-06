<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Project;
use HexTechnology\Models\Task;
use HexTechnology\Models\Time;
use Rhubarb\Crown\DateTime\RhubarbDateTime;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Checkbox\Checkbox;
use Rhubarb\Leaf\Controls\Common\DateTime\Date;
use Rhubarb\Leaf\Controls\Common\SelectionControls\RadioButtons\RadioButtons;
use Rhubarb\Leaf\Controls\Common\Text\NumericTextBox;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Table\Leaves\Table;

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
            new Date("ExpenseDate"),
            $expenseType = new RadioButtons("ExpenseType"),

            // Tasks
            new TextBox("NewTaskTitle"),
            new Checkbox("Completed"),
            new Button("NewTaskEvent", "Add Task", function () {
                $this->model->NewTaskEvent->raise();
            }),
            $toggle = new Button("ToggleTaskButton", "↺", function ($viewIndex) {
                $this->model->ToggleTaskEvent->raise($viewIndex);
            }),
            // Time
            $startTimeButton = new Button("StartTimeNow", "Start Timing Now", function () {
                $this->model->StartTimingEvent->raise();
            }),
            $endTimeButton = new Button("StopTimeNow", "Stop Timing", function ($viewIndex) {
                $this->model->StopTimingEvent->raise($viewIndex);
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
                "ExpenseType",
                "Date"
            ];
    }

    protected function printInnerContent()
    {
        /** @var Project $project */
        $project = $this->model->restModel;

        print "<div class='multi-column'>";

        print "<div>";
        $this->layoutItemsWithContainer("Project Details",
            [
                "ProjectName",
                "ClientID"
            ]);
        print "</div>";
        if ($project->isNewRecord() == false) {
            print "<div>";
            print "<h2>Related Expenses</h2>";

            if (sizeof($project->Expenses) > 0) {
                print "<div class='overflow-auto'>";
                print $this->leaves["ExpensesTable"];
                print "</div>";

                ?>
                <p>Total Expenses: £<?= $project->TotalExpenses ?></p>
                <p>Total Profit: £<?= $project->TotalProfit ?></p>
                <?
            }

            $this->layoutItemsWithContainer("New Expense",
                [
                    "ExpenseTitle",
                    "NumberOfUnits",
                    "UnitCost",
                    "TotalCharge",
                    "ExpenseType",
                    "NewExpenseEvent",
                    "ExpenseDate"
                ]);
            print "</div>";

            print "<div>";
            print "<h2>Related Tasks</h2>";

            if ($this->model->restModel->isNewRecord() == false && sizeof($tasks = $this->model->restModel->Tasks) > 0) {
                ?>
                <table>
                    <thead>
                    <th></th>
                    <th>Task Title</th>
                    <th></th>
                    </thead>
                    <?php
                    /** @var Task $task */
                    foreach ($tasks as $task) {
                        $style = ($task->Completed) ? "style='text-decoration: line-through;'" : "";
                        ?>
                        <tr>
                            <td><a href="/tasks/<?= $task->TaskID ?>/">view</a></td>
                            <td <?= $style ?>><?= $task->TaskTitle ?></td>
                            <td><?php $this->leaves["ToggleTaskButton"]->printWithIndex($task->TaskID); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }

            $this->layoutItemsWithContainer("New Task",
                [
                    "NewTaskTitle",
                    "NewTaskEvent"
                ]
            );
            print "</div>";

            print "<div>";
            print "<h2>Time Tracking</h2>";
            print $this->leaves["StartTimeNow"];
            if ($this->model->restModel->isNewRecord() == false && sizeof($times = $this->model->restModel->Times) > 0) {
                ?>
                <table>
                    <thead>
                    <th></th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Time</th>
                    </thead>
                    <?php
                    /** @var Time $time */
                    foreach ($times as $time) {
                        $startTime = new RhubarbDateTime($time->StartTime);
                        $endTime = new RhubarbDateTime($time->EndTime);
                        ?>
                        <tr>
                            <td><a href="/times/<?= $time->TimeID ?>/">view</a></td>
                            <td><?= $startTime->format("d m Y H:i:s") ?></td>
                            <td><?= $endTime->format("d m Y H:i:s") ?></td>
                            <td>
                                <?php
                                if ($time->EndTime == "") {
                                    $this->leaves["StopTimeNow"]->printWithIndex($time->TimeID);
                                } else {
                                    print round($time->TotalHours, 1) . "h";
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Grand Total</td>
                        <td><?= $project->TotalTime ?></td>
                    </tr>
                </table>
                <?php
            }

            $this->layoutItemsWithContainer("New Task",
                [
                    "NewTaskTitle",
                    "NewTaskEvent"
                ]
            );
            print "</div>";
        }

        print "</div>";
    }
}

