<?php

namespace App\Http\Livewire\Roles;

use App\Models\Project;
use Livewire\Component;
use App\Models\Role;

class Create extends Component
{
    public $roleCreated;
    public $name;
    public $role;

    public $prefix;
    public $project_id;

    // Toast
    public $type = 'success';
    public $message;
    public $toastr;

    public function render()
    {
        return view('livewire.roles.create');
    }

    public function save()
    {
        $this->validate(['name' => 'required']);
        $this->project_id = Project::getProjectId($this->prefix);
        $role = new Role();
        $role->create([
            'name' => $this->name,
            'project_id' => $this->project_id
        ])->save();
        // Pass the role object to the route('permission.store') | POST
        $this->role = Role::where('name', $this->name)->where('project_id', $this->project_id)->first();
        $this->roleCreated = true;
        $this->message = __('response.Added successfully.');
        $this->toastr = true;
    }
}
