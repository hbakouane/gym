<?php

namespace App\Http\Livewire\Features;

use App\Models\Feature;
use Illuminate\Http\Request;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $description;

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

        $features->create([
            'name' => $this->name,
            'description' => $this->description,
        ])->save();
        $this->reset();
        return $this->toastr = true;
    }
}
