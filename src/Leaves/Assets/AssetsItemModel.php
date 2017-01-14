<?php

namespace HexTechnology\Leaves\Assets;

use Rhubarb\Crown\Events\Event;
use Rhubarb\Leaf\Crud\Leaves\CrudModel;


class AssetsItemModel extends CrudModel
{
    /**
     * @var Event
     */
    public $serialAddedEvent;

    public $SerialNumberCode = "";
    public $SerialNumberInitialPrice = "";
    public $SerialNumberCurrentValue = "";
    public $SerialNumberPurchaseDate = "";

    public $testEvent;

    public function __construct()
    {
        $this->serialAddedEvent = new Event();
        $this->testEvent = new Event();
        parent::__construct();
    }

}