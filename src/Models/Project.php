<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
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
            new ForeignKeyColumn("ClientID")
        );
        $schema->labelColumnName = "ProjectName";
        return $schema;
    }
}