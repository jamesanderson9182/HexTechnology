<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Expense;
use HexTechnology\Tests\HexTechnologyTestCase;
use Rhubarb\Crown\DateTime\RhubarbDate;
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

    public function testExpenseHasADate() {
    	$expense = new Expense();
    	$expense->Date = new RhubarbDate('now');
    	$expense->ExpenseTitle = "example";
    	$expense->save();

    	$this->assertEquals($expense->Date, new RhubarbDate('now'), "Expenses can have a date");
	}
}