<?php

namespace App\Http\Livewire\Membership;

use App\Http\Controllers\PlanFeaturesCheckerController;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $prefix;
    public $member_id;
    public $name;
    public $members; // All members
    public $member; // Selected member
    public $showCard;
    public $subscription_id;
    public $more = false;
    public $payment_date;
    public $payment_type = 'Cash';
    public $amount;
    public $starts_at;
    public $ends_at;
    public $note;
    public $toastr;
    public $message;
    public $type;

    public function render()
    {
        return view('livewire.membership.create');
    }

    public function mount()
    {
        $members = Member::whereProject($this->prefix)->get();
        // Set the payment date to today, because at the most of time, it will be today
        $this->payment_date = Carbon::today()->toDateString();
    }

    public function getMember()
    {
        $this->members = Member::WhereProject($this->prefix)->where('name', 'like', "%$this->name%")->limit(5)->get();
    }

    public function getOneMember($id, $closeSuggestions = false)
    {
        if ($closeSuggestions) {
            $this->showCard = true;
        } else {
            $this->showCard = false;
        }
        $this->member_id = $id;
        $this->member = Member::whereProject($this->prefix)->where('id', $id)->first();
        $this->name = $this->member->name;

        // Set the start today and the end is (today + $subscription->duration)
        $this->starts_at = Carbon::today()->toDateString();
        $this->ends_at = Carbon::today()->addDays($this->member->subscription->duration)->toDateString();

        // Set the amount to the subscription's amount
        $this->amount = $this->member->subscription->price;
    }

    public function save()
    {
        // Validate the request
        $this->validate([
            'name' => 'required',
            'payment_date' => 'required',
            'amount' => 'required',
            'payment_type' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required',
            'note' => 'nullable'
        ]);

        // Save The membership
        // Generate an id
        $membership_id = Str::random(9);
        $membership = new Membership();
        $membership->create([
            'member_id' => $this->member_id,
            'model_type' => Auth::guard('staff')->check() ? 'App\Models\Staff' : 'App\Models\User',
            'model_id' => Auth::guard('staff')->check() ? Auth::guard('staff')->user()->id : Auth::id(),
            'project_id' => Project::getProjectId($this->prefix),
            'payment_date' => $this->payment_date,
            'amount' => $this->amount,
            'note' => $this->note,
            'membership_id' => $membership_id
        ])->save();

        // Update the dates on the Member model
        $this->member->update([
            'started_at' => $this->starts_at,
            'ended_at' => $this->ends_at
        ]);

        // Add this payment to the payment table
        Payment::create([
            'payable_type' => 'App\Models\Member',
            'payable_id' => $this->member_id,
            'project_id' => Project::getProjectId($this->prefix),
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'payment_date' => $this->payment_date,
            'note' => $this->note,
            'membership_id' => $membership_id
        ])->save();

        // Reset the properties
        $this->reset(['member_id', 'amount', 'note', 'member', 'showCard']);

        // Toast success
        $this->type = 'success';
        $this->message = __('response.Created successfully.');
        $this->toastr = true;
    }
}
