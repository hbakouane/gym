<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $payments = Payment::whereHas('project', function (Builder $builder) {
            $builder->where('project', request('project_id'));
        })->orderBy('id', 'DESC')->get();
        return view('livewire.payments.index', ['payments' => $payments]);
    }

    public function delete($id)
    {
        Payment::find($id)->delete();
    }
}
