<?php

namespace HexTechnology\Models;


use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $ManufacturerID Repository field
 * @property string $ManufacturerName Repository field
 * @property-read Asset[]|\Rhubarb\Stem\Collections\RepositoryCollection $Assets Relationship
 */
class Manufacturer extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Manufacturer");
        $schema->addColumn(
            new AutoIncrementColumn("ManufacturerID"),
            new StringColumn("ManufacturerName", 30)
        );
        $schema->labelColumnName = "ManufacturerName";
        return $schema;
    }
}