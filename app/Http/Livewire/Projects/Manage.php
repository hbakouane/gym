<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Manage extends Component
{
    public $projects;

    public function render()
    {
        return view('livewire.projects.manage');
    }

    public function mount()
    {
        $this->projects = Project::getUserProjects();
    }

    public function deleteProject($id)
    {
        Project::where('id', $id)->delete();
        return $this->projects = Project::getUserProjects();
    }
}
