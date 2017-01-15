<?php

namespace HexTechnology\Leaves\Expenses;

use HexTechnology\Layouts\HexTechnologyItemView;

class ExpensesItemView extends HexTechnologyItemView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ExpenseTitle",
            "ExpenseDetails",
            "NumberOfUnits",
            "UnitCost",
            "TotalCharge",
            "ExpenseType"
        );
    }

    protected function printInnerContent()
    {
        $this->layoutItemsWithContainer("",
            [
                "ExpenseTitle",
                "ExpenseDetails",
                "NumberOfUnits",
                "UnitCost",
                "TotalCharge",
                "ExpenseType"
            ]);
    }

}