<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Manage extends Component
{
    public $projects;

    public $notice = '';

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
        // If a staff wants to delete a project, stop the script from running
        if (auth()->guard('staff')->check()) {
            dd(__('roles.You are not allowed to do this action'));
            exit;
        }
        $project = Project::where('id', $id)->first();
        // Users cannot delete their projects during free trial
        if ($project->trial === null OR $project->trial === false) {
            return $this->notice = __('project.You cannot delete a project during the free trial');
        }
        $project->delete();
        return $this->projects = Project::getUserProjects();
    }
}
