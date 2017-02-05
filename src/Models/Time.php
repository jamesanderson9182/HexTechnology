<?php

namespace HexTechnology\Models;

use Rhubarb\Crown\DateTime\RhubarbDate;
use Rhubarb\Crown\DateTime\RhubarbDateTime;
use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DateTimeColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\ModelSchema;

/**
 *
 *
 * @property int $TimeID Repository field
 * @property int $ProjectID Repository field
 * @property \Rhubarb\Crown\DateTime\RhubarbDateTime $StartTime Repository field
 * @property \Rhubarb\Crown\DateTime\RhubarbDateTime $EndTime Repository field
 * @property-read Project $Project Relationship
 * @property-read mixed $TotalTime {@link getTotalTime()}
 */
class Time extends Model
{

    protected function createSchema()
    {
        $schema = new ModelSchema("Time");
        $schema->addColumn(
            new AutoIncrementColumn("TimeID"),
            new ForeignKeyColumn("ProjectID"),
            new DateTimeColumn("StartTime", new RhubarbDate("now")),
            new DateTimeColumn("EndTime")
        );
        //TODO have a think about a label name for this model
        return $schema;
    }

    public function getTotalTime()
    {
        if ($this->EndTime != "") {
            $dateTime = new RhubarbDateTime($this->StartTime);
            return $dateTime->diff($this->EndTime);
        }
        return "";
    }
}