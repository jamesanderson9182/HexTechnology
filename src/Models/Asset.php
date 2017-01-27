<?php

namespace HexTechnology\Models;


use Rhubarb\Stem\Models\Model;
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
 * @property string $MaxPowerRating Repository field
 * @property string $Model Repository field
 * @property int $ManufacturerID Repository field
 * @property-read Manufacturer $Manufacturer Relationship
 * @property-read mixed $NumberOwned {@link getNumberOwned()}
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
            new StringColumn("Model", 30),
            new MoneyColumn("RentalCostPerDay"),
            new MoneyColumn("RentalCostPerWeek"),
            new StringColumn("MaxPowerRating", 30),
            new ForeignKeyColumn("AssetTypeID"),
            new LongStringColumn("Description"),
            new ForeignKeyColumn("ManufacturerID")
        );
        $schema->labelColumnName = "AssetName";
        return $schema;
    }

    protected function beforeSave()
    {
        parent::beforeSave();
        if($this->AssetName == "")
        {
            if ($this->Manufacturer != null && $this->Model != "") {
                $this->AssetName = $this->Manufacturer->ManufacturerName . " " . $this->Model;
            }
        }
    }

    public function getNumberOwned() {
        return sizeof($this->SerialNumbers);
    }

    // TODO Method for times rented
}