<?php


namespace HexTechnology\Models;


use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\MoneyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;


/**
 *
 *
 * @property int $SerialNumberID Repository field
 * @property string $SerialNumberCode Repository field
 * @property float $InitialValue Repository field
 * @property float $CurrentValue Repository field
 * @property int $AssetID Repository field
 */
class SerialNumber extends Model
{

    protected function createSchema()
    {
        $schema = new ModelSchema("SerialNumber");
        $schema->addColumn(
            new AutoIncrementColumn("SerialNumberID"),
            new StringColumn("SerialNumberCode", 30),
            new MoneyColumn("InitialValue"),
            new MoneyColumn("CurrentValue"),
            new ForeignKeyColumn("AssetID")
        );
        $schema->labelColumnName = "AssetName";
        return $schema;
    }
}