<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\Client;
use HexTechnology\Models\Expense;
use HexTechnology\Models\Manufacturer;
use HexTechnology\Models\Project;
use HexTechnology\Models\Quote;
use HexTechnology\Models\QuoteItem;
use HexTechnology\Models\SerialNumber;
use HexTechnology\Models\Task;
use HexTechnology\Models\Time;
use Rhubarb\Crown\DateTime\RhubarbDate;

abstract class SeederUseCase
{
    final function __construct()
    {
        $this->seed();
    }

    abstract function seed();

    public function assetTypeGenerator(string $name): AssetType
    {
        $assetType = new AssetType();
        $assetType->AssetTypeName = $name;
        $assetType->save();
        return $assetType;
    }

    public function assetGenerator(
        AssetType $assetType,
        Manufacturer $manufacturer,
        string $name,
        string $description,
        string $model
    ): Asset {
        $asset = new Asset();
        $asset->AssetName = $name;
        $asset->RentalCostPerDay = 15;
        $asset->RentalCostPerWeek = 30;
        $asset->Description = $description;
        $asset->AssetTypeID = $assetType->AssetTypeID;
        $asset->MaxPowerRating = "Na";
        $asset->Model = $model;
        $asset->ManufacturerID = $manufacturer->ManufacturerID;
        $asset->save();
        return $asset;
    }

    public function clientGenerator(
        $displayName,
        $forename,
        $surname,
        $address1,
        $address2,
        $town,
        $mobile,
        $telephone,
        $email
    ): Client {
        $client = new Client();
        $client->ClientDisplayName = $displayName;
        $client->Forename = $forename;
        $client->Surname = $surname;
        $client->AddressLine1 = $address1;
        $client->Postcode = $address2;
        $client->Town = $town;
        $client->Mobile = $mobile;
        $client->Telephone = $telephone;
        $client->Email = $email;
        $client->save();
        return $client;
    }

    /**
     * @param $client
     * @param $projectName
     * @return Project
     */
    public function projectGenerator($client, $projectName): Project
    {
        $project = new Project();
        $project->ClientID = $client->ClientID;
        $project->ProjectName = $projectName;
        $project->save();
        return $project;
    }

    /**
     * @param $project
     * @param $startTime
     * @param $endTime
     */
    public function timeGenerator($project, $startTime, $endTime): void
    {
        $time = new Time();
        $time->ProjectID = $project->ProjectID;
        $time->StartTime = $startTime;
        $time->EndTime = $endTime;
        $time->save();
    }

    /**
     * @param $project
     * @param $title
     * @param $details
     * @param $date
     * @param $numberOfUnits
     * @param $unitCost
     * @param $expenseType
     * @return Expense
     */
    public function projectExpenseGenerator(
        Project $project,
        $title,
        $details,
        $date,
        $numberOfUnits,
        $unitCost,
        $expenseType
    ): Expense {
        $expense = $this->expenseGenerator(
            $title,
            $details,
            $date,
            $numberOfUnits,
            $unitCost,
            $expenseType);
        $expense->ProjectID = $project->ProjectID;
        return $expense;
    }

    public function expenseGenerator(
        $title,
        $details,
        $date,
        $numberOfUnits,
        $unitCost,
        $expenseType = Expense::EXPENSE_TYPE_PURCHASE
    ) {
        $expense = new Expense();
        $expense->ExpenseTitle = $title;
        $expense->ExpenseDetails = $details;
        $expense->Date = $date;
        $expense->NumberOfUnits = $numberOfUnits;
        $expense->UnitCost = $unitCost;
        $expense->TotalCharge = $numberOfUnits * $unitCost;
        $expense->ExpenseType = $expenseType;
        $expense->save();
        return $expense;
    }

    /**
     * @param $title
     * @param $project
     * @return Task
     */
    public function projectTaskGenerator($title, Project $project): Task
    {
        $task = $this->taskGenerator($title);
        $task->ProjectID = $project->ProjectID;
        $task->save();
        return $task;
    }

    public function taskGenerator($title): Task
    {
        $task = new Task();
        $task->TaskTitle = $title;
        $task->Completed = true;
        $task->save();
        return $task;
    }

    /**
     * @param $client
     * @param $project
     * @return Quote
     */
    public function quoteGenerator($client, $project): Quote
    {
        $quote = new Quote();
        $quote->ClientID = $client->ClientID;
        $quote->DateCreated = new RhubarbDate("Now");
        $quote->ProjectID = $project->ProjectID;
        $quote->save();
        return $quote;
    }

    public function quoteItemGenerator($quote, $title, $unitCost, $numberOfUnits): QuoteItem
    {
        $quoteItem = new QuoteItem();
        $quoteItem->QuoteID = $quote->QuoteID;
        $quoteItem->QuoteItemTitle = $title;
        $quoteItem->UnitCost = $unitCost;
        $quoteItem->NumberOfUnits = $numberOfUnits;
        $quoteItem->save();
        return $quoteItem;
    }

    /**
     * @param $project
     * @return Expense
     */
    public function timeExpenseGenerator($project): Expense
    {
        return $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to ...",
            new RhubarbDate("now"),
            10,
            15,
            Expense::EXPENSE_TYPE_TIME
        );
    }

    /**
     * @param $project
     * @param $date
     */
    public function selfRentalExpenseGenerator($project, $date): void
    {
        $this->projectExpenseGenerator(
            $project,
            "Rental",
            "Rental order to myself",
            $date,
            1,
            1000,
            Expense::EXPENSE_TYPE_PURCHASE
        );
    }

    protected function serialNumberGenerator(string $serialNumberCode, Asset $asset)
    {
        $serial = new SerialNumber();
        $serial->SerialNumberCode = $serialNumberCode;
        $serial->InitialValue = 100;
        $serial->CurrentValue = 90;
        $serial->AssetID = $asset->AssetID;
        $serial->PurchaseDate = new RhubarbDate("now");
        $serial->save();
    }

    protected function manufacturerGenerator(string $name): Manufacturer
    {
        $manufacturer = new Manufacturer();
        $manufacturer->ManufacturerName = $name;
        $manufacturer->save();
        return $manufacturer;
    }
}