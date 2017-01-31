<?php

namespace HexTechnology\Models;

use Rhubarb\Stem\Schema\SolutionSchema;

class HexTechnologySolutionSchema extends SolutionSchema
{
    public function __construct($version = 1.1)
    {
        parent::__construct($version);
        $this->addModel("Asset", Asset::class);
        $this->addModel("SerialNumber", SerialNumber::class);
        $this->addModel("AssetType", AssetType::class);
        $this->addModel("Manufacturer", Manufacturer::class);
        $this->addModel("Client", Client::class);
        $this->addModel("Project", Project::class);
        $this->addModel("Expense", Expense::class);
        $this->addModel("Task", Task::class);
        $this->addModel("Rental", Rental::class);
        $this->addModel("Quote", Quote::class);
        $this->addModel("QuoteItem", QuoteItem::class);
        $this->addModel("Time", Time::class);
    }

    protected function defineRelationships()
    {
        parent::defineRelationships();
        /**
         * One Asset can have many serial numbers
         * One Asset Type can have many Assets
         * One manufacturer can have many Assets
         * One Client will have many projects
         * One Project can have many expenses
         * One Project can have many tasks
         */
        $this->declareOneToManyRelationships([
            "Asset" =>
                [
                    "SerialNumbers" => "SerialNumber.AssetID"
                ],
            "AssetType" =>
                [
                    "Assets" => "Asset.AssetTypeID"
                ],
            "Manufacturer" =>
                [
                    "Assets" => "Asset.ManufacturerID"
                ],
            "Client" =>
                [
                    "Projects" => "Project.ClientID",
                    "Rentals" => "Rental.ClientID",
                    "Quotes" => "Quote.ClientID"
                ],
            "Project" =>
                [
                    "Expenses" => "Expense.ProjectID",
                    "Tasks" => "Task.ProjectID",
                    "Times" => "Time.ProjectID"
                ],
            "Quote" =>
                [
                    "QuoteItems" => "QuoteItem.QuoteID"
                ]
        ]);

        /**
         * One Project can have one quote
         */
        $this->declareOneToOneRelationships([
            "Project" => [
                "Quote" => "Quote.ProjectID"
            ]
        ]);
    }

}