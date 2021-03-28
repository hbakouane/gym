<?php

namespace App\Http\Livewire\Roles;

use App\Models\Project;
use App\Models\Role;
use Livewire\Component;

class Index extends Component
{
    public $roles;
    public $prefix;

    // Toastr
    public $message;
    public $type = "success";
    public $toastr = false;

    public function render()
    {
        return view('livewire.roles.index');
    }

    public function mount()
    {
        $this->roles = Role::where('project_id', Project::getProjectId($this->prefix))->orderBy('id', 'DESC')->get();
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        $this->roles = Role::where('project_id', Project::getProjectId($this->prefix))->orderBy('id', 'DESC')->get();
        $this->type = "error";
        $this->message = __('response.Deleted successfully.');
        return $this->toastr = true;
    }
}
