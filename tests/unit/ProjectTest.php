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
}