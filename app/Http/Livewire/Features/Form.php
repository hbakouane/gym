<?php

namespace App\Http\Livewire\Features;

use App\Models\Feature;
use App\Models\Project;
use Illuminate\Http\Request;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $description;
    public $prefix;

    public $toastr = false;

    public $rules = [
        'name' => 'required',
    ];

    public function render()
    {
        return view('livewire.features.form');
    }

    public function save(Request $request)
    {
        $this->validate();
        $features = new Feature();
        $data = $request->only(['name', 'description']);
        $data['created_by'] = auth()->id();
        $project = Project::where('project', $this->prefix)->first();
        $data['project_id'] = $project->id;

        $features->create([
            'name' => $this->name,
            'description' => $this->description,
            'project_id' => $data['project_id']
        ])->save();
        $this->resetExcept('prefix');
        return $this->toastr = true;
    }
}
