<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $prefix;
    public function render()
    {
        return view('livewire.navbar');
    }
}
