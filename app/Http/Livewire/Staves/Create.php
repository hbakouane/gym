<?php

namespace App\Http\Livewire\Staves;

use App\Models\Project;
use App\Models\Role;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    // Information to save
    public $name;
    public $email;
    public $phone;
    public $cne;
    public $photo;
    public $address;
    public $password;
    public $city;
    public $country;
    public $role_id;

    public $roles;

    public $prefix;

    // Validation
    public $rules = [
        'name' => 'required',
        'email' => 'required|unique:staff',
        'city' => 'required',
        'country' => 'required',
        'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif',
        'password' => 'required|min:8'
    ];

    // Toasting
    public $toastr = false;
    public $type = 'success';
    public $message;

    public function render()
    {
        return view('livewire.staves.create');
    }

    public function mount()
    {
        $this->roles = Role::where('project_id', Project::getProjectId($this->prefix))->get();
    }

    public function save()
    {
        // Validate the request
        $this->validate($this->rules);

        // check if the photo exists
        if ($this->photo) {
            $file = $this->photo->store('public/staves');
            $imageUrl = Storage::url($file);
        }

        // Get the project id
        $project_id = Project::getProjectId($this->prefix);

        // Register the staff
        $staff = new Staff();
        $staff->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'cne' => $this->cne,
            'photo' => $imageUrl ?? null,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'password' => bcrypt($this->password),
            'project_id' => $project_id,
            'role_id' => $this->role_id
        ])->save();

        // Toast success
        $this->message = __('staves.Staff added successfully.');
        $this->type = 'success';
        $this->toastr = true;

        // Reset all the properties but the toast ones
        $this->reset(['name', 'email', 'phone', 'cne', 'photo', 'address', 'city', 'country', 'password']);
    }

}
