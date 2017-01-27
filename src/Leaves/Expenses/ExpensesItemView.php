<?php

namespace HexTechnology\Leaves\Expenses;

use HexTechnology\Layouts\HexTechnologyItemView;
use HexTechnology\Models\Expense;
use Rhubarb\Crown\String\StringTools;
use Rhubarb\Leaf\Controls\Common\FileUpload\SimpleFileUpload;
use Rhubarb\Leaf\Controls\Common\FileUpload\UploadedFileDetails;
use Rhubarb\Leaf\Controls\Html5Upload\Html5FileUpload;

class ExpensesItemView extends HexTechnologyItemView
{
    /**
     * @var ExpensesItemModel
     */
    protected $model;

    protected function createSubLeaves()
    {
        parent::createSubLeaves();
        $this->registerSubLeaf(
            "ExpenseTitle",
            "ExpenseDetails",
            "NumberOfUnits",
            "UnitCost",
            "TotalCharge",
            "ExpenseType",
            "Date",

            $upload = new SimpleFileUpload('Upload')

        );

        $upload->fileUploadedEvent->attachHandler(function (UploadedFileDetails $content) {
            $this->model->logoUploadedEvent->raise($content);
        });

    }

    protected function printInnerContent()
    {
        /** @var Expense $expense */
        $expense = $this->model->restModel;
        $this->layoutItemsWithContainer("",
            [
                "ExpenseTitle",
                "ExpenseDetails",
                "NumberOfUnits",
                "UnitCost",
                "TotalCharge",
                "ExpenseType",
                "Date"
            ]);
        print $this->leaves["Upload"];
        print '<br>';

        if ($expense->isNewRecord() == false) {
            if ($expense->FileName != "") {
                if (StringTools::contains($expense->FileType, 'image')) {
                    ?>
                    <img src="<?= $expense->DownloadUrl ?>" alt="Image" style="width: 25%">
                    <br>
                    <?
                }
                ?>
                <a href="<?= $expense->DownloadUrl ?>"><?= $expense->FileName ?></a>
                <br>
                <?php
            }
        }
    }

}