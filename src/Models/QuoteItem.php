<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DecimalColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\MoneyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $QuoteItemID Repository field
 * @property int $QuoteID Repository field
 * @property-read Quote $Quote Relationship
 * @property float $UnitCost Repository field
 * @property float $NumberOfUnits Repository field
 * @property-read mixed $Amount {@link getAmount()}
 * @property int $ProjectID Repository field
 * @property string $QuoteTitle Repository field
 * @property string $QuoteItemTitle Repository field
 */
class QuoteItem extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("QuoteItem");
        $schema->addColumn(
            new AutoIncrementColumn("QuoteItemID"),
            new ForeignKeyColumn("QuoteID"),
            new StringColumn("QuoteItemTitle", 50),
            new MoneyColumn("UnitCost"),
            new DecimalColumn("NumberOfUnits")
        );

        $schema->labelColumnName = "QuoteItemTitle";

        return $schema;
    }

    public function getAmount() {
        if ($this->UnitCost != null && $this->NumberOfUnits != null) {
            return $this->UnitCost * $this->NumberOfUnits;
        }
    }
}