<?php

namespace App\Http\Livewire\Projects;

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

    // Step3
    public $UserName;
    public $UserPhone;
    public $UserAddress;
    public $UserCity;
    public $UserCountry;

    public function render()
    {
        return view('livewire.projects.create-project');
    }

    public function mount()
    {
        $this->Project = Str::random(10);
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
            'UserName' => 'required',
            'UserPhone' => 'required',
            'UserAddress' => 'required',
            'UserCity' => 'required',
            'UserCountry' => 'required',
        ]);
        $this->step2 = false;
        $this->step3 = true;
    }

    public function saveStepThree()
    {
        $this->step3 = false;
        $this->step4 = true;
    }

}
