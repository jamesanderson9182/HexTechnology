<?php

namespace HexTechnology\Leaves\Project;

use HexTechnology\Models\Expense;
use Rhubarb\Crown\Exceptions\ForceResponseException;
use Rhubarb\Crown\Response\RedirectResponse;
use Rhubarb\Leaf\Crud\Leaves\CrudLeaf;
use Rhubarb\Stem\Models\Validation\ValidationError;

class ProjectItem extends CrudLeaf
{

    /**
     * @var ProjectItemModel
     */
    protected $model;

    /**
     * Returns the name of the standard view used for this leaf.
     *
     * @return string
     */
    protected function getViewClass()
    {
        return ProjectItemView::class;
    }

    /**
     *
     * Set up the model that is going pass data across to our view
     *
     * @return ProjectItemModel
     */
    protected function createModel()
    {
        return new ProjectItemModel();
    }

    protected function onModelCreated()
    {
        $this->model->NewExpenseEvent->attachHandler(function () {


            if($this->model->ExpenseTitle == ""){
                // An expense needs to have title!
                throw new ForceResponseException(new RedirectResponse("."));
            }
            $expense = new Expense();

            $expense->ProjectID = $this->model->restModel->UniqueIdentifier;
            $expense->ExpenseTitle = $this->model->ExpenseTitle;
            $expense->ExpenseType = $this->model->ExpenseType;
            $expense->NumberOfUnits = $this->model->NumberOfUnits;
            $expense->TotalCharge = $this->model->TotalCharge;
            $expense->UnitCost = $this->model->UnitCost;

            $expense->save();

            // Redirect the User to the current page to stop the page stying a POST
            throw new ForceResponseException(new RedirectResponse("."));
        });
        parent::onModelCreated();
    }

}