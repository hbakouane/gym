<?php

namespace App\Http\Livewire\Payments;

use App\Models\Member;
use App\Models\Payment;
use Livewire\Component;

class Edit extends Component
{
    public $member_id;
    public $name;
    public $members; // All members
    public $member; // Selected member
    public $showCard;
    public $more = false;
    public $payment;
    public $payment_type;
    public $payment_date;
    public $amount;
    public $note;
    public $toastr;
    public $message;
    public $type;

    public function mount()
    {
        $this->payment = Payment::findOrFail(request('payment'));
        $this->member_id = $this->payment->member->id;
        $this->member = Member::find($this->member_id);
        $this->showCard = true;
        $this->name = $this->payment->member->name;
        $this->payment_type = $this->payment->payment_type;
        $this->payment_date = $this->payment->payment_date;
        $this->amount = $this->payment->amount;
        $this->note = $this->payment->note;
    }

    public function render()
    {
        return view('livewire.payments.edit');
    }

    public function update()
    {
        $this->validate([
            'member_id' => 'required|integer',
            'name' => 'required',
            'amount' => 'required',
            'payment_type' => 'required',
            'payment_date' => 'required',
            'note' => 'sometimes'
        ]);
        $this->payment->fill([
            'member_id' => $this->member_id,
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'payment_date' => $this->payment_date,
            'note' => $this->note
        ])->save();
        $this->message = __('payments.Payment updated successfully.');
        $this->type = "success";
        $this->toastr = true;
    }
}
