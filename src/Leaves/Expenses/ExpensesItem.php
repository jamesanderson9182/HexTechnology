<?php

namespace HexTechnology\Leaves\Expenses;

use HexTechnology\Models\Expense;
use Rhubarb\Leaf\Controls\Common\FileUpload\UploadedFileDetails;
use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;

class ExpensesItem extends CrudLeaf
{
    /**
     * @var ExpensesItemModel
     */
    protected $model;

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return ExpensesItemView::class;
    }

    protected function createModel()
    {
       return new ExpensesItemModel();
    }

    protected function onModelCreated()
    {
        parent::onModelCreated();
        $this->model->logoUploadedEvent->attachHandler(function(UploadedFileDetails $details){
            $uploadDirectory = APPLICATION_ROOT_DIR . '/static/uploads/' . $this->model->restModel->UniqueIdentifier . '/';
                if(file_exists($uploadDirectory) == false) {
                         mkdir($uploadDirectory, 0777, true);
                }
                move_uploaded_file($details->tempFilename, $uploadDirectory. $details->originalFilename);
                $this->model->restModel->FileName = $details->originalFilename;
                $this->model->restModel->FileType = $_FILES['ExpensesItem_Upload']['type'];
        });
    }

    protected function redirectAfterSave()
    {

    }

}