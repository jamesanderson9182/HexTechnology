<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Client;
use HexTechnology\Models\Expense;
use HexTechnology\Models\Project;
use HexTechnology\Models\Task;
use HexTechnology\Tests\HexTechnologyTestCase;

class ProjectTest extends HexTechnologyTestCase
{
    public function testCanAccessRelated()
    {
        $client = new Client();
        $client->ClientDisplayName = "Tester";
        $client->save();

        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->save();

        $this->assertEquals($client->ClientDisplayName, $project->Client->ClientDisplayName, "A Project can have a Client");

        $task = new Task();
        $task->TaskTitle = "This is a task";
        $task->save();

        $task->ProjectID = $project->ProjectID;
        $task->save();

        $this->assertEquals($task->TaskTitle, $project->Tasks[0]->TaskTitle, "A Project can have many Tasks");

        $expense = new Expense();
        $expense->ExpenseTitle = "Test Expense";
        $expense->save();

        $expense->ProjectID = $project->ProjectID;
        $expense->save();

        $this->assertEquals($task->TaskTitle, $project->Tasks[0]->TaskTitle, "A Project can have many Tasks");
    }

    public function testTotalExpenses()
    {
        $project = new Project();
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Four Times Three Equals 12";
        $expense->UnitCost = 4;
        $expense->NumberOfUnits = 3;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Five Times Nine Equals 45";
        $expense->UnitCost = 5;
        $expense->NumberOfUnits = 9;
        $expense->save();

        $expenditure = $project->TotalExpenses;
        $this->assertEquals(4 * 3 + 5 * 9, $expenditure, "TotalExpenses of a Project should equal the sum of Expense.UnitCost(s) x Expenses.NumberOfUnit(s)");
    }

    public function testTotalProfitAndRevenue()
    {
        $project = new Project();
        $project->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Sample tracking hours against project";
        //Cost per hour
        $expense->UnitCost = 21.30;
        //Hours worked
        $expense->NumberOfUnits = 3;
        $expense->TotalCharge = 100;
        $expense->ExpenseType = Expense::EXPENSE_TYPE_TIME;
        $expense->save();

        $expense = new Expense();
        $expense->ProjectID = $project->ProjectID;
        $expense->ExpenseTitle = "Buy paint";
        $expense->UnitCost = 10.30;
        //Hours worked
        $expense->NumberOfUnits = 1;
        $expense->TotalCharge = 10; //Did't charge the 30p
        $expense->ExpenseType = Expense::EXPENSE_TYPE_PURCHASE;
        $expense->save();

        $this->assertEquals(110, $project->TotalRevenue, "TotalRevenue should equal the sum of Expense.TotalCharge(s)");


        $this->assertEquals(35.80 , $project->TotalRevenue - $project->TotalExpenses, "TotalProfit should equal Total Revenue Minus TotalExpenses");
    }

    public function testProjectsCanHaveTasks(){
        $project = new Project();
        $project->save();

        $task = new Task();
        $task->ProjectID = $project->ProjectID;
        $task->TaskTitle = "test 1";
        $task->save();

        $task = new Task();
        $task->ProjectID = $project->ProjectID;
        $task->TaskTitle = "test 2";
        $task->save();

        $this->assertEquals(2, sizeof($project->Tasks), "Projects should be able to have tasks associated with them");
    }

}