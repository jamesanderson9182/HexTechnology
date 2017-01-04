<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $AssetTypeID Repository field
 * @property string $AssetTypeName Repository field
 * @property-read Asset[]|\Rhubarb\Stem\Collections\RepositoryCollection $Assets Relationship
 */
class AssetType extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("AssetType");
        $schema->addColumn(
          new AutoIncrementColumn("AssetTypeID"),
            new StringColumn("AssetTypeName", 30)
        );
        $schema->labelColumnName = "AssetTypeName";
        return $schema;
    }
}