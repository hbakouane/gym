<?php

namespace App\Http\Livewire\Credits;

use App\Models\Credit;
use App\Models\Member;
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
        return view('livewire.credits.create');
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
        $credit = new Credit();
        $credit->create([
            'member_id' => $this->member_id,
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'payment_date' => $this->payment_date,
            'note' => $this->note
        ])->save();
        $this->reset(['amount', 'payment_type', 'payment_date', 'note']);
        $this->message = __('credits.Credit added successfully.');
        $this->type = "success";
        return $this->toastr = true;
    }
}
