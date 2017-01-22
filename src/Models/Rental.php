<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $RentalID Repository field
 * @property int $ClientID Repository field
 * @property-read Client $Client Relationship
 */
class Rental extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Rental");
        $schema->addColumn(
            new AutoIncrementColumn("RentalID"),
            new ForeignKeyColumn("ClientID")
        );
        return $schema;
    }
}