<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Exceptions\ModelConsistencyValidationException;
use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\MySql\Schema\Columns\MySqlEnumColumn;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DateColumn;
use Rhubarb\Stem\Schema\Columns\DecimalColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\IntegerColumn;
use Rhubarb\Stem\Schema\Columns\LongStringColumn;
use Rhubarb\Stem\Schema\Columns\MoneyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $ProjectExpenseID Repository field
 * @property int $ProjectID Repository field
 * @property string $ExpenseTitle Repository field
 * @property string $ExpenseDetails Repository field
 * @property int $NumberOfUnits Repository field
 * @property float $UnitCost Repository field
 * @property float $TotalCharge Repository field
 * @property string $ExpenseType Repository field
 * @property-read Project $Project Relationship
 * @property int $ExpenseID Repository field
 * @property \Rhubarb\Crown\DateTime\RhubarbDate $Date Repository field
 */
class Expense extends Model
{
    const EXPENSE_TYPE_PURCHASE = "Purchase";
    const EXPENSE_TYPE_TIME = "Time";
    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Expense");
        $schema->addColumn(
            new AutoIncrementColumn("ExpenseID"),
            new ForeignKeyColumn("ProjectID"),
            new StringColumn("ExpenseTitle", 50),
			new DateColumn("Date"),
            new LongStringColumn("ExpenseDetails"),
            new IntegerColumn("NumberOfUnits"),
            new DecimalColumn("UnitCost"),
            new MoneyColumn("TotalCharge"),
            new MySqlEnumColumn("ExpenseType", self::EXPENSE_TYPE_PURCHASE, [
                self::EXPENSE_TYPE_PURCHASE,
                self::EXPENSE_TYPE_TIME
            ])
        );
        $schema->labelColumnName = "ExpenseTitle";
        return $schema;
    }

    protected function beforeSave()
    {
        if($this->ExpenseTitle == ""){
            throw new ModelConsistencyValidationException(["Expenses should have a title!"]);
        }

        parent::beforeSave();
    }

}