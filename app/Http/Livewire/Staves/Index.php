<?php

namespace App\Http\Livewire\Staves;

use App\Http\Controllers\RolesController;
use App\Models\Project;
use App\Models\Staff;
use Livewire\Component;
use App\Models\Role;

class Index extends Component
{
    public $staffs;
    public $project_id;

    // Toast
    public $message;
    public $type = "success";
    public $toastr = false;

    public function render()
    {
        return view('livewire.staves.index');
    }

    public function mount()
    {
        $this->project_id = Project::getProjectIdOrFail(request('project_id'));
        $this->staffs = Staff::where('project_id', $this->project_id)->orderBy('id', 'DESC')->get();
        $roles = Role::where('project_id', $this->project_id)->get();
    }

    public function delete($id)
    {
        // Check if the staff has the right to do this action
        RolesController::checkRole('staves.delete');
        Staff::find($id)->delete();
        $this->message = __('staves.Staff deleted successfully.');
        $this->type = "success";
        $this->toastr = true;
        $this->staffs = Staff::where('project_id', $this->project_id)->orderBy('id', 'DESC')->get();
    }
}
