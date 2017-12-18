<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Task;

class TaskDataSeeder extends SeederUseCase
{
    function seed()
    {
        $tasks = [
            "Put new bar codes on",
            "Phone yer man back",
            "Tick this box"
        ];
        foreach ($tasks as $task) {
            $this->taskGenerator($task);
        }
    }
}