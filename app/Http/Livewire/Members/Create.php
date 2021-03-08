<?php

namespace App\Http\Livewire\Members;

use App\Models\Member;
use Livewire\Component;

class Create extends Component
{
    public $subscriptions;
    public $name;
    public $phone;
    public $cni;
    public $photo;
    public $email;
    public $address;
    public $zip;
    public $city;
    public $country;
    public $subscription_id;
    public $note;

    public function render()
    {
        return view('livewire.members.create');
    }

    public function store()
    {
        $member = new Member();

    }
}
