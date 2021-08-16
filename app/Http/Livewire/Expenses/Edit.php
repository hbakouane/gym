<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use App\Models\Project;
use Livewire\Component;

class Edit extends Component
{
    public $amount;
    public $expense;
    public $vendor;
    public $date;
    public $service;
    public $note;
    public $prefix;

    // Toastr
    public $type = 'success';
    public $message;
    public $toastr;

    // Rules for validation
    public $rules = [
        'date' => 'date',
        'amount' => 'integer',
        'vendor' => 'required',
        'service' => 'required',
        'note' => 'nullable'
    ];

    public function render()
    {
        return view('livewire.expenses.edit');
    }

    public function mount()
    {
        $this->expense = Expense::where('project_id', Project::getProjectId($this->prefix))
                            ->where('id', request('expense'))
                            ->first();
        $this->amount = $this->expense->amount;
        $this->vendor = $this->expense->vendor;
        $this->date = $this->expense->date;
        $this->service = $this->expense->service;
        $this->note = $this->expense->note;
    }

    public function save()
    {
        $this->validate($this->rules);
        $this->expense->update([
            'amount' => $this->amount,
            'vendor' => $this->vendor,
            'date' => $this->date,
            'service' => $this->service,
            'note' => $this->note,
        ]);
        $this->type = "success";
        $this->message = __('expenses.Expense updated successfully.');
        $this->toastr = true;
    }
}
