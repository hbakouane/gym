<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $payments = Payment::where('project_id', Project::getProjectId(request('project_id')))->asc()->get();
        return view('livewire.payments.index', ['payments' => $payments]);
    }

    public function delete($id)
    {
        Payment::find($id)->delete();
    }
}
