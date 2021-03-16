<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public $amount;
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
        return view('livewire.expenses.create');
    }

    public function save()
    {
        $this->validate($this->rules);
        Expense::create([
            'amount' => $this->amount,
            'vendor' => $this->vendor,
            'date' => $this->date,
            'service' => $this->service,
            'note' => $this->note,
            'project_id' => Project::getProjectId($this->prefix)
        ])->save();
        $this->type = "success";
        $this->message = __('expenses.Expense created successfully.');
        $this->toastr = true;
        $this->reset(['amount', 'vendor', 'date', 'service', 'note']);
    }
}
