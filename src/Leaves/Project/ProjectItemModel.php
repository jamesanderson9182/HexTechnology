<?php

namespace HexTechnology\Leaves\Project;

use Rhubarb\Crown\Events\Event;
use Rhubarb\Leaf\Crud\Leaves\CrudModel;
use Rhubarb\Patterns\Mvp\Application\TableWithEditableCells\TableWithEditableCellsView;

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

    public $NewTaskTitle = "";

    /**
     * @var Event
     */
    public $NewTaskEvent;

    /**
     * @var Event
     */
    public $ToggleTaskEvent;

    /**
     * @var Event
     */
    public $StartTimingEvent;

    /**
     * @var Event
     */
    public $StopTimingEvent;

    public function __construct()
    {
        parent::__construct();
        $this->NewExpenseEvent = new Event();
        $this->NewTaskEvent = new Event();
        $this->ToggleTaskEvent = new Event();
        $this->StartTimingEvent = new Event();
        $this->StopTimingEvent = new Event();
    }

}