<?php

namespace App\Http\Livewire\Credits;

use App\Models\Credit;
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
    public $status;
    public $toastr;
    public $message;
    public $type;

    public function mount()
    {
        $this->payment = Credit::where('id', (request('credit')))->first();
        $creditable = $this->payment->creditable_type::where('id', $this->payment->creditable_id)->first();
        $this->member_id = $creditable->id;
        $this->member = Member::find($this->member_id);
        $this->showCard = true;
        $this->name = $creditable->name;
        $this->payment_type = $this->payment->payment_type;
        $this->payment_date = $this->payment->payment_date;
        $this->amount = $this->payment->amount;
        $this->status = $this->payment->status;
        $this->note = $this->payment->note;
    }

    public function render()
    {
        return view('livewire.credits.edit');
    }

    public function update()
    {
        $this->validate([
            'member_id' => 'required|integer',
            'name' => 'required',
            'amount' => 'required',
            'payment_type' => 'required',
            'payment_date' => 'required',
            'note' => 'sometimes',
            'status' => 'required'
        ]);
        $this->payment->fill([
            'member_id' => $this->member_id,
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'payment_date' => $this->payment_date,
            'note' => $this->note,
            'status' => $this->status
        ])->save();
        $this->message = __('credits.Credit added successfully.');
        $this->type = "success";
        $this->toastr = true;
    }
}
