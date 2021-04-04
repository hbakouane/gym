<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateProject extends Component
{
    // Steps
    public $step1 = true;
    public $step2 = false;
    public $step3 = false;
    public $step4 = false;

    // Step1
    public $Project;
    public $ProjectName;
    public $Country;
    public $City;
    public $Address;
    public $Zip;
    public $Currency = '$';

    // Step3
    public $UserPhone;
    public $UserAddress;
    public $UserCity;
    public $UserCountry;

    public $projects;

    public function render()
    {
        return view('livewire.projects.create-project');
    }

    public function mount()
    {
        $this->Project = Str::random(10);
        $this->projects = Project::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
    }

    public function handleToggle($willBeActive, $willBeInactive)
    {
        $this->$willBeActive = true;
        $this->$willBeInactive = false;
    }

    public function saveStepOne()
    {
        $this->validate([
            'Project' => 'required|unique:projects|alpha_dash|max:20',
            'ProjectName' => 'required',
            'Country' => 'required',
            'City' => 'required',
            'Address' => 'required',
            'Zip' => 'required|integer'
        ]);
        $this->step1 = false;
        $this->step2 = true;
    }

    public function saveStepTwo()
    {
        $this->validate([
            'UserPhone' => 'required',
            'UserAddress' => 'required',
            'UserCity' => 'required',
            'UserCountry' => 'required',
        ]);
        $this->step2 = false;
        $this->step4 = true;
        $this->saveStepThree();
    }

    public function saveStepThree()
    {
        $this->step3 = false;
        $this->step4 = true;

        // Save the project information
        $project = new Project();
        $project->create([
            'user_id' => auth()->id(),
            'name' => $this->ProjectName,
            'project' => $this->Project,
            'country' => $this->Country,
            'city' => $this->City,
            'address' => $this->Address,
            'zip' => $this->Zip,
            'plan_id' => 1,
            'currency' => $this->Currency
        ])->save();

        // Save the user information
        $user = auth()->user();
        $user->update([
            'phone' => $this->UserPhone,
            'address' => $this->UserAddress,
            'city' => $this->UserCity,
            'country' => $this->UserCountry
        ]);
    }

}
