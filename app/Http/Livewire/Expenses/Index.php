<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public $type = "success";
    public $message;
    public $toastr = false;
    public $prefix;

    public function render()
    {
        $expenses = Expense::where('project_id', Project::getProjectId($this->prefix))->orderBy('id', 'DESC')->get();
        return view('livewire.expenses.index', ['expenses' => $expenses]);
    }

    public function delete($id)
    {
        Expense::find($id)->delete();
        $this->type = "success";
        $this->message = __('expenses.Expense deleted successfully.');
        $this->toastr = true;
    }

}
