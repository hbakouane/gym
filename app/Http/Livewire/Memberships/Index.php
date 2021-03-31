<?php

namespace App\Http\Livewire\Memberships;

use App\Http\Controllers\RolesController;
use App\Models\Membership;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public $prefix;

    // Toastr
    public $message;
    public $type = 'success';
    public $toastr = false;

    public $memberships;

    public function render()
    {
        return view('livewire.memberships.index');
    }

    public function mount()
    {
        $this->memberships = Membership::where('project_id', Project::getProjectId($this->prefix))->orderBy('id', 'DESC')->get();
    }

    public function delete($id)
    {
        RolesController::checkRole('memberships.delete');
        Membership::find($id)->delete();
        $this->type = 'warning';
        $this->message = __('response.Deleted successfully.');
        $this->toastr = true;
        $this->memberships = Membership::where('project_id', Project::getProjectId($this->prefix))->orderBy('id', 'DESC')->get();
    }
}
