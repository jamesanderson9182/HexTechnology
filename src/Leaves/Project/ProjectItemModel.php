<?php

namespace HexTechnology\Leaves\Project;

use Rhubarb\Crown\Events\Event;
use Rhubarb\Leaf\Crud\Leaves\CrudModel;

class ProjectItemModel extends CrudModel
{
    public $ExpenseTitle = "";
    public $NumberOfUnits = "";
    public $UnitCost = "";
    public $TotalCharge = "";
    public $ExpenseType = "";

    /**
     * @var Event
     */
    public $NewExpenseEvent;

    public function __construct()
    {
        parent::__construct();
        $this->NewExpenseEvent = new Event();
    }

}