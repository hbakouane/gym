<?php

namespace App\Http\Livewire\Staves;

use App\Models\Project;
use App\Models\Role;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    // Information to save
    public $staff;
    public $name;
    public $email;
    public $phone;
    public $cne;
    public $photo; // The photo that will be uploaded
    public $address;
    public $city;
    public $country;
    public $photo_url; // The photo coming from te Database
    public $roles;
    public $role_id;

    // For Changing password form
    public $yourpassword; // Admin password
    public $newpassword; // New staff's password

    public $staffId;

    // Validation
    public $rules = [
        'name' => 'required',
        'city' => 'required',
        'country' => 'required',
        'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif'
    ];

    public $prefix;

    // Toasting
    public $toastr = false;
    public $type = 'success';
    public $message;

    public function render()
    {
        return view('livewire.staves.edit');
    }

    public function mount()
    {
        $staff = Staff::where('project_id', Project::getProjectId(request('project_id')))->where('id', $this->staffId)->first();
        $this->staff = $staff;
        $this->name = $staff->name;
        $this->email = $staff->email;
        $this->phone = $staff->phone;
        $this->cne = $staff->cne;
        $this->address = $staff->address;
        $this->photo_url = $staff->photo;
        $this->city = $staff->city;
        $this->country= $staff->country;
        $this->role_id= $staff->role_id;
        $this->roles= Role::where('project_id', Project::getProjectId($this->prefix))->get();
    }

    public function save()
    {
        // Validate the request
        $this->validate($this->rules);

        // check if the photo exists
        if ($this->photo) {
            // Delete the old photo if it exists
            if (!empty($this->photo)) {
                // Generate old image link without the domain name
                $old_file = Str::after($this->photo_url, env('APP_URL') . '/storage/');
                // Make the right path for the delete() method
                $old_file_path = 'public/' . $old_file;
                Storage::delete($old_file_path);
            }
            // Upload the file
            $filename = $this->photo->store('public/staved');
            $imageUrl = url(Storage::url($filename));
        }

        // Updated the staff
        $this->staff->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'cne' => $this->cne,
            'photo' => $imageUrl ?? $this->photo_url,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'role_id' => $this->role_id
        ]);

        // Change the photo URL
        $this->photo_url = $imageUrl ?? $this->photo_url;

        // Toast success
        $this->message = __('staves.Staff updated successfully.');
        $this->type = 'success';
        $this->toastr = true;

        // Reset all the properties but the toast ones
    }

    public function changePassword()
    {
        $this->validate([
            'yourpassword' => 'password', // Password makes sure that the $yourpassword matches the authenticated user's password
            'newpassword' => 'required|min:8'
        ]);
        $this->staff->update([
            'password' => bcrypt($this->newpassword)
        ]);
        $this->message = __('staves.Password saved successfully.');
        $this->type = "success";
        $this->toastr = true;
    }

}
