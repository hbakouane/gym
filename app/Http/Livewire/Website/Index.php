<?php

namespace App\Http\Livewire\Website;

use App\Models\Project;
use App\Models\Subscription;
use Livewire\Component;

class Index extends Component
{
    public $prefix;

    public $name;
    public $address;
    public $city;
    public $zip;
    public $country;
    public $currency;

    public $project;

    public $type = 'success';
    public $message;
    public $toastr = false;

    public $subscriptions;

    public function render()
    {
        return view('livewire.website.index');
    }

    public function mount()
    {
        $project = Project::where('project', $this->prefix)->first();
        $this->project = $project;
        $this->name = $project->name;
        $this->address = $project->address;
        $this->city = $project->city;
        $this->zip = $project->zip;
        $this->country = $project->country;
        $this->currency = $project->currency;

        $this->subscriptions = \App\Models\Saas\Subscription::where('user_id', auth()->id())->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'country' => 'required',
            'currency' => 'required'
        ]);
        $this->project->update([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'zip' => $this->zip,
            'country' => $this->country,
            'currency' => $this->currency
        ]);
        // Toast success
        $this->message = __('response.Updated successfully.');
        $this->type = 'success';
        $this->toastr = true;
    }
}
