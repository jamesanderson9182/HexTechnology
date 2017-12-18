<?php

namespace HexTechnology\Custard;

use Rhubarb\Crown\DateTime\RhubarbDate;

class ExpenseSeeder extends SeederUseCase
{
    function seed()
    {
        $expenses = [
            "PC" => "New Pc with better graphics card to render videos faster",
            "MacBookPro 2017 17\"" => "Because who needs USB 3",
            "Car" => "Brum brum"
        ];

        foreach ($expenses as $expense => $description) {
            $this->expenseGenerator(
                $expense,
                $description,
                new RhubarbDate("4 days ago"),
                3,
                15
            );
        }
    }
}