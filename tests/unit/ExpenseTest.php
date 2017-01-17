<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Expense;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Stem\Exceptions\ModelConsistencyValidationException;

class ExpenseTest extends HexTechnologyTestCase
{
    public function testBeforeSave()
    {
        $this->assertThrowsException(ModelConsistencyValidationException::class , function () {
            $expense = new Expense();
            $expense->save();
        }, "Expenses need to have an ExpenseTitle");
    }
}