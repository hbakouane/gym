<?php

namespace App\Http\Livewire\Features;

use App\Models\Feature;
use Livewire\Component;

class Index extends Component
{
    public $toastr = false;
    public $type = 'success';

    public function render()
    {
        $features = Feature::orderBy('id', 'DESC')->get();
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
