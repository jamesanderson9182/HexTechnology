<?php

namespace HexTechnology\Models;

use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DateColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $QuoteID Repository field
 * @property-read Project $Project Relationship
 * @property-read QuoteItem[]|\Rhubarb\Stem\Collections\RepositoryCollection $QuoteItems Relationship
 * @property-read int|mixed $GrandTotal {@link getGrandTotal()}
 * @property int $ClientID Repository field
 * @property-read Client $Client Relationship
 */
class Quote extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Quote");
        $schema->addColumn(
            new AutoIncrementColumn("QuoteID"),
            new ForeignKeyColumn("ClientID"),
            new DateColumn("DateCreated", new RhubarbDate("now")) // Hopefully the default value won't break anything
        );
        return $schema;
    }

    /**
     * @return int|mixed $GrandTotal
     */
    public function getGrandTotal() {
        $grandTotal = 0;
        foreach ($this->QuoteItems as $quoteItem)
        {
            $grandTotal += $quoteItem->Amount;
        }

        return $grandTotal;
    }
}