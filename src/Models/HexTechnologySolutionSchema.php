<?php

namespace HexTechnology\Models;


use Rhubarb\Stem\Schema\SolutionSchema;

class HexTechnologySolutionSchema extends SolutionSchema
{
    public function __construct($version = 1.1)
    {
        parent::__construct($version);
        $this->addModel("Asset", Asset::class, 1.1);
        $this->addModel("SerialNumber", SerialNumber::class, 1.1);
    }

    protected function defineRelationships()
    {
        parent::defineRelationships();
        $this->declareOneToManyRelationships([
            "Asset" =>
                [
                    "SerialNumbers" => "SerialNumber.AssetID"
                ]
        ]);
    }


}