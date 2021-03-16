<?php

namespace App\Http\Livewire\Features;

use App\Models\Feature;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public $toastr = false;
    public $type = 'success';

    public function render()
    {
        $project_id = Project::where('project', request('project_id'))->firstOrFail()->id;
        $features = Feature::where('project_id', $project_id)->orderBy('id', 'DESC')->get();
        return view('livewire.features.index', ['features' => $features]);
    }

    public function delete($id)
    {
        Feature::find($id)->delete();
        $this->reset();
        $this->toastr = true;
        $this->type = 'warning';
    }
}
