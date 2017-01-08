<?php


namespace HexTechnology\Models;


use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Crown\Tests\Fixtures\Codeception\RhubarbConnector;
use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DateColumn;
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
 * @property-read Asset $Asset Relationship
 * @property RhubarbDate $PurchaseDate Repository field
 * @property RhubarbDate $DateAddedToSystem Repository field
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
            new DateColumn("PurchaseDate"),
            new DateColumn("DateAddedToSystem"),
            new ForeignKeyColumn("AssetID")
        );
        $schema->labelColumnName = "AssetName";
        return $schema;
    }

    protected function beforeSave()
    {
        parent::beforeSave();
        //Save the date added to the system to be now if it hasn't already been saved
        if( $this->isNewRecord() ){
            $this->DateAddedToSystem = new RhubarbDate("now");
        }
    }

}