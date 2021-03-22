<?php

namespace App\Http\Livewire\Staves;

use App\Models\Staff;
use Livewire\Component;

class Index extends Component
{
    public $staffs;

    // Toast
    public $message;
    public $type = "success";
    public $toastr = false;

    public function render()
    {
        return view('livewire.staves.index');
    }

    public function mount()
    {
        $this->staffs = Staff::orderBy('id', 'DESC')->get();
    }

    public function delete($id)
    {
        Staff::find($id)->delete();
        $this->message = __('staves.Staff delete');
        $this->type = "success";
        $this->toastr = true;
    }
}
