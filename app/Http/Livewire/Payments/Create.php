<?php

namespace App\Http\Livewire\Payments;

use App\Models\Member;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $prefix;
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

    public $payable_type;

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
        $model = $this->payable_type == "member" ? 'App\Models\Member' : 'App\Models\Vendor';
        $this->members = $model::WhereProject($this->prefix)->where('name', 'like', "%$this->name%")->limit(5)->get();
    }

    public function getOneMember($id, $closeSuggestions = false)
    {
        if ($closeSuggestions) {
            $this->showCard = true;
        } else {
            $this->showCard = false;
        }
        $this->member_id = $id;
        $this->member = $this->payable_type == "member" ? Member::WhereProject($this->prefix)->where('id', $id)->first() : Vendor::WhereProject($this->prefix)->where('id', $id)->first();
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
        $payable_type = $this->payable_type == "member" ? 'App\Models\Member' : 'App\Models\Vendor';
        $payment->create([
            'payable_id' => $this->member_id,
            'payable_type' => $payable_type,
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'payment_date' => $this->payment_date,
            'note' => $this->note,
            'project_id' => Project::getProjectId($this->prefix)
        ])->save();
        $this->reset(['amount', 'payment_type', 'payment_date', 'note']);
        $this->message = __('payments.Payment added successfully.');
        $this->type = "success";
        return $this->toastr = true;
    }
}
