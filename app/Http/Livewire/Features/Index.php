<?php

namespace App\Http\Livewire\Features;

use App\Http\Controllers\RolesController;
use App\Models\Feature;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $toastr = false;
    public $message;
    public $type = 'success';

    public $project_id;
    public $features;

    public function render()
    {
        return view('livewire.features.index', ['features' => $this->features]);
    }

    public function mount()
    {
        $this->project_id = Project::where('project', request('project_id'))->firstOrFail()->id;
        $this->features = Feature::where('project_id', $this->project_id)->orderBy('id', 'DESC')->get();
    }

    public function delete($id)
    {
        RolesController::checkRole('features.delete');
        Feature::find($id)->delete();
        $this->features = Feature::where('project_id', $this->project_id)->orderBy('id', 'DESC')->get();
        $this->message = __('plan.Feature deleted successfully.');
        $this->type = 'warning';
        $this->toastr = true;
    }
}
