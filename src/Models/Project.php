<?php

namespace HexTechnology\Models;

use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DateColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $ProjectID Repository field
 * @property string $ProjectName Repository field
 * @property int $ClientID Repository field
 * @property-read Client $Client Relationship
 * @property-read Expense[]|\Rhubarb\Stem\Collections\RepositoryCollection $ProjectExpenses Relationship
 * @property-read Expense[]|\Rhubarb\Stem\Collections\RepositoryCollection $Expenses Relationship
 * @property-read Task[]|\Rhubarb\Stem\Collections\RepositoryCollection $Tasks Relationship
 * @property-read mixed $TotalExpenses {@link getTotalExpenses()}
 * @property-read mixed $TotalRevenue {@link getTotalRevenue()}
 * @property-read mixed $TotalProfit {@link getTotalProfit()}
 * @property-read Quote $Quote Relationship
 * @property \Rhubarb\Crown\DateTime\RhubarbDate $Date Repository field
 * @property-read Time[]|\Rhubarb\Stem\Collections\RepositoryCollection $Times Relationship
 */
class Project extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Project");
        $schema->addColumn(
            new AutoIncrementColumn("ProjectID"),
            new StringColumn("ProjectName", 50),
            new DateColumn("Date", new RhubarbDate('now')),
            new ForeignKeyColumn("ClientID")
        );
        $schema->labelColumnName = "ProjectName";
        return $schema;
    }

    public function getTotalExpenses()
    {
        $totalExpenses = 0;
        foreach ($this->Expenses as $expense) {
            $totalExpenses += $expense->UnitCost * $expense->NumberOfUnits;
        }
        return $totalExpenses;
    }

    public function getTotalRevenue()
    {
        $totalRevenue = 0;

        foreach ($this->Expenses as $expense)
        {
            $totalRevenue += $expense->TotalCharge;
        }

        return $totalRevenue;
    }

    public function getTotalProfit()
    {
        return $this->TotalRevenue - $this->TotalExpenses;
    }
}