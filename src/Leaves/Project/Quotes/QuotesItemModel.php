<?php

namespace HexTechnology\Leaves\Project\Quotes;

use Rhubarb\Crown\Events\Event;
use Rhubarb\Leaf\Crud\Leaves\CrudModel;

class QuotesItemModel extends CrudModel
{
    /**
     * @var string
     */
    public $NewQuoteItemTitle;

    /**
     * @var string
     */
    public $NewUnitCost;

    /**
     * @var string
     */
    public $NewNumberOfUnits;

    /***
     * @var Event
     */
    public $AddNewQuoteItemEvent;

    public function __construct()
    {
        parent::__construct();
        $this->AddNewQuoteItemEvent = new Event();
    }

}