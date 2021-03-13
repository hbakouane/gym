<?php

namespace App\Http\Livewire\Payments;

use App\Models\Member;
use App\Models\Payment;
use Livewire\Component;

class Create extends Component
{
    public $member_id;
    public $name;
    public $members; // All members
    public $member; // Selected member
    public $showCard;
    public $more = false;
    public $payment_type;
    public $payment_date;
    public $amount;
    public $note;
    public $toastr;
    public $message;
    public $type;

    public function render()
    {
        return view('livewire.payments.create');
    }

    public function mount()
    {
        $members = Member::all();
    }

    public function getMember()
    {
        $this->members = Member::where('name', 'like', "%$this->name%")->limit(5)->get();
    }

    public function getOneMember($id, $closeSuggestions = false)
    {
        if ($closeSuggestions) {
            $this->showCard = true;
        } else {
            $this->showCard = false;
        }
        $this->member_id = $id;
        $this->member = Member::find($id);
        $this->name = $this->member->name;
    }

    public function save()
    {
        $this->validate([
            'member_id' => 'required|integer',
            'amount' => 'required',
            'payment_type' => 'required',
            'payment_date' => 'required',
            'note' => 'sometimes'
        ]);
        $payment = new Payment();
        $payment->create([
            'member_id' => $this->member_id,
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'payment_date' => $this->payment_date,
            'note' => $this->note
        ])->save();
        $this->reset(['amount', 'payment_type', 'payment_date', 'note']);
        $this->message = __('payments.Payment added successfully.');
        $this->type = "success";
        return $this->toastr = true;
    }
}
