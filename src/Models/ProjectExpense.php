<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\MySql\Schema\Columns\MySqlEnumColumn;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
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
 */
class ProjectExpense extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("ProjectExpense");
        $schema->addColumn(
            new AutoIncrementColumn("ProjectExpenseID"),
            new ForeignKeyColumn("ProjectID"),
            new StringColumn("ExpenseTitle", 50),
            new LongStringColumn("ExpenseDetails"),
            new IntegerColumn("NumberOfUnits"),
            new DecimalColumn("UnitCost"),
            new MoneyColumn("TotalCharge"),
            new MySqlEnumColumn("ExpenseType", "Purchase", [
                "Purchase",
                "Time"
            ])
        );
        $schema->labelColumnName = "ExpenseTitle";
        return $schema;
    }
}