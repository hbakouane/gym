<?php

namespace App\Http\Livewire\Payments;

use App\Http\Controllers\RolesController;
use App\Models\Payment;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public $modelType;
    public $toastr = false;
    public $message;
    public $type = "success";
    public $prefix;

    public $payments;

    public function render()
    {
        $this->payments = Payment::where('project_id', Project::getProjectId($this->prefix))->asc()->get();
        return view('livewire.payments.index', ['payments' => $this->payments]);
    }

    public function delete($id, $modelType)
    {
        // Check if the user is able to do this action
        RolesController::checkRole('payments.delete');
        // Delete
        Payment::where('id', $id)->first()->delete();
        // Toast success
        $this->type = "success";
        $this->message = __('general.Deleted successfully.');
        $this->toastr = true;

        $this->payments = Payment::where('project_id', Project::getProjectId($this->prefix))->asc()->get();
    }
}
