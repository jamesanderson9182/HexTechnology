<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 05/01/2017
 * Time: 19:55
 */

namespace HexTechnology\Models;


use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Schema\ModelSchema;

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
//        $schema->addColumn(
//
//        );

    }
}