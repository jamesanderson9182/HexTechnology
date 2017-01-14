<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\BooleanColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\LongStringColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $TaskID Repository field
 * @property string $TaskTitle Repository field
 * @property string $TaskDescription Repository field
 * @property bool $Completed Repository field
 * @property int $ProjectID Repository field
 * @property-read Project $Project Relationship
 */
class Task extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Task");
        $schema->addColumn(
            new AutoIncrementColumn("TaskID"),
            new StringColumn("TaskTitle", 50),
            new LongStringColumn("TaskDescription"),
            new BooleanColumn("Completed"),
            new ForeignKeyColumn("ProjectID")
        );
        $schema->labelColumnName = "TaskTitle";
        return $schema;
    }
}