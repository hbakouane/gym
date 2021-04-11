<?php

namespace App\Http\Livewire\Members;

use App\Http\Controllers\PlanFeaturesCheckerController;
use App\Models\Member;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $subscriptions;
    public $project_id;
    public $name;
    public $phone;
    public $cni;
    public $photo;
    public $email;
    public $address;
    public $zip;
    public $city;
    public $country;
    public $subscription;
    public $note;

    // Toastr
    public $toastr;
    public $type = "success";
    public $message;

    // Rules for validation
    public $rules = [
        'name' => 'required',
        'subscription' => 'required',
        'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif'
    ];

    public function render()
    {
        PlanFeaturesCheckerController::check('members.create', $this->project_id);
        return view('livewire.members.create');
    }

    public function store()
    {
        $this->validate($this->rules);

        // Deal with the member's photo
        if ($this->photo) {
            $file = $this->photo->store('public/members');
            $filepath = url(Storage::url($file));
        }

        // Get the project id
        $project_id = Project::where('project', $this->project_id)->first()->id;
        $member = new Member();
        $member->create([
            'name' => $this->name,
            'phone' => $this->phone,
            'cne' => $this->cni,
            'photo' => $filepath ?? '',
            'email' => $this->email,
            'address' => $this->address,
            'zip' => $this->zip,
            'city' => $this->city,
            'country' => $this->country,
            'subscription_id' => $this->subscription,
            'note' => $this->note,
            'project_id' => $project_id,
        ])->save();

        // Toast success
        $this->toastr = true;
        $this->message = __('members.Member added successfully.');
        $this->reset(['name', 'phone', 'cni', 'photo', 'email', 'address', 'zip', 'city', 'country', 'subscription', 'note']);
    }
}
