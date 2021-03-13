<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $payments = Payment::orderBy('id', 'DESC')->get();
        return view('livewire.payments.index', ['payments' => $payments]);
    }

    public function delete($id)
    {
        Payment::find($id)->delete();
    }
}
