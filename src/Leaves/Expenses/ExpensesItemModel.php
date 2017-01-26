<?php

namespace HexTechnology\Leaves\Expenses;

use Rhubarb\Crown\Events\Event;
use Rhubarb\Leaf\Crud\Leaves\CrudModel;

class ExpensesItemModel extends CrudModel
{
    /**
     * @var Event
     */
    public $logoUploadedEvent;

    public function __construct()
    {
        $this->logoUploadedEvent = new Event();
        parent::__construct();
    }
}