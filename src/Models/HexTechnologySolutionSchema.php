<?php

namespace HexTechnology\Models;


use Rhubarb\Stem\Schema\SolutionSchema;

class HexTechnologySolutionSchema extends SolutionSchema
{
    public function __construct($version = 1.0)
    {
        parent::__construct($version);
        $this->addModel("Asset", Asset::class, 1.0);
    }

}