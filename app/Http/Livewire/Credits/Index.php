<?php

namespace App\Http\Livewire\Credits;

use App\Models\Credit;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public $modelType;
    public $toastr = false;
    public $message;
    public $type = "success";
    public $prefix;

    public function render()
    {
        $credits = Credit::where('project_id', Project::getProjectId($this->prefix))->orderBy('id', 'DESC')->get();
        return view('livewire.credits.index', ['credits' => $credits]);
    }

    public function delete($id)
    {
        // Delete
        Credit::find($id)->delete();
        // Toast success
        $this->type = "success";
        $this->message = __('general.Deleted successfully.');
        $this->toastr = true;
    }
}
