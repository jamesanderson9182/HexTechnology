<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $ClientID Repository field
 * @property string $ClientDisplayName Repository field
 * @property string $Forename Repository field
 * @property string $Surname Repository field
 * @property string $AddressLine1 Repository field
 * @property string $Postcode Repository field
 * @property string $Town Repository field
 * @property string $Mobile Repository field
 * @property string $Telephone Repository field
 * @property string $Email Repository field
 * @property-read Project[]|\Rhubarb\Stem\Collections\RepositoryCollection $Projects Relationship
 * @property-read Rental[]|\Rhubarb\Stem\Collections\RepositoryCollection $Rentals Relationship
 * @property-read Quote[]|\Rhubarb\Stem\Collections\RepositoryCollection $Quotes Relationship
 */
class Client extends Model
{

    /**
     * Returns the schema for this data object.
     *
     * @return \Rhubarb\Stem\Schema\ModelSchema
     */
    protected function createSchema()
    {
        $schema = new ModelSchema("Client");
        $schema->addColumn(
            new AutoIncrementColumn("ClientID"),
            new StringColumn("ClientDisplayName", 50),
            new StringColumn("Forename", 50),
            new StringColumn("Surname", 50),
            new StringColumn("AddressLine1", 50),
            new StringColumn("Postcode", 8),
            new StringColumn("Town", 50),
            new StringColumn("Mobile", 50),
            new StringColumn("Telephone", 50),
            new StringColumn("Email", 50)
        );
        $schema->labelColumnName = "ClientDisplayName";
        return $schema;
    }

    public function beforeSave()
    {
        if ($this->ClientDisplayName == "") {
            $this->ClientDisplayName = $this->Forename . " " . $this->Surname;
        }
        parent::beforeSave();
    }
}