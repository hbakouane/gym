<?php

namespace App\Http\Livewire\Credits;

use App\Models\Credit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $credits = Credit::orderBy('id', 'DESC')->get();
        return view('livewire.credits.index', ['credits' => $credits]);
    }

    public function delete($id)
    {
        Credit::find($id)->delete();
    }
}
