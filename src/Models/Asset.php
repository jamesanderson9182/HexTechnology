<?php

namespace HexTechnology\Models;


use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\MySql\Schema\Columns\MySqlEnumColumn;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\LongStringColumn;
use Rhubarb\Stem\Schema\Columns\MoneyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $AssetID Repository field
 * @property string $AssetName Repository field
 * @property float $InitialCost Repository field
 * @property float $CurrentRentalCost Repository field
 * @property string $SerialNumber Repository field
 * @property string $AssetType Repository field
 * @property string $Description Repository field
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
            new MoneyColumn("InitialCost"),
            new MoneyColumn("CurrentRentalCost"),
            new StringColumn("SerialNumber", 30),
            new MySqlEnumColumn(
                "AssetType",
                "Cable",
                [
                    "Cable",
                    "SoundDesk",
                    "Speaker",
                    "Adaptor",
                    "LightFixture",
                    "LightingDesk",
                    "Other"
                ]),
            new LongStringColumn("Description")
        );
        $schema->labelColumnName = "AssetName";
        return $schema;
    }
}