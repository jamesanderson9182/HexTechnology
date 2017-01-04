<?php

namespace HexTechnology\Models;


use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\MySql\Schema\Columns\MySqlEnumColumn;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\LongStringColumn;
use Rhubarb\Stem\Schema\Columns\MoneyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;


/**
 *
 *
 * @property int $AssetID Repository field
 * @property string $AssetName Repository field
 * @property float $RentalCostPerDay Repository field
 * @property float $RentalCostPerWeek Repository field
 * @property string $AssetType Repository field
 * @property string $Description Repository field
 * @property-read SerialNumber[]|\Rhubarb\Stem\Collections\RepositoryCollection $SerialNumbers Relationship
 * @property int $AssetTypeID Repository field
 */
class Asset extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Asset");
        $schema->addColumn(
            new AutoIncrementColumn("AssetID"),
            new StringColumn("AssetName", 30),
            new MoneyColumn("RentalCostPerDay"),
            new MoneyColumn("RentalCostPerWeek"),
            new ForeignKeyColumn("AssetTypeID"),
            new LongStringColumn("Description")
        );
        $schema->labelColumnName = "AssetName";
        return $schema;
    }
}