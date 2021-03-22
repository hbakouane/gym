<?php

namespace App\Http\Livewire\Staves;

use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    // Information to save
    public $name;
    public $email;
    public $phone;
    public $cne;
    public $photo;
    public $address;
    public $city;
    public $country;

    public $staffId;

    // Validation
    public $rules = [
        'name' => 'required',
        'city' => 'required',
        'country' => 'required',
        'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif'
    ];

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
        $staff = Staff::find($this->staffId);
        $this->name = $staff->name;
        $this->email = $staff->email;
        $this->phone = $staff->phone;
        $this->cne = $staff->cne;
        $this->address = $staff->address;
        $this->photo = $staff->photo;
        $this->city = $staff->city;
        $this->country= $staff->country;
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
                $old_file = Str::after($user->profile_img, env('APP_URL') . '/storage/');
                // Make the right path for the delete() method
                $old_file_path = 'public/' . $old_file;
                Storage::delete($old_file_path);
            }
            // Upload the file
            $filename = $this->photo->store('public/staved');
            $imageUrl = url(Storage::url($filename));
        }

        // Register the staff
        $staff = new Staff();
        $staff->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'cne' => $this->cne,
            'photo' => $imageUrl ?? null,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
        ]);

        // Toast success
        $this->message = __('staves.Staff added successfully.');
        $this->type = 'success';
        $this->toastr = true;

        // Reset all the properties but the toast ones
        $this->reset(['name', 'email', 'phone', 'cne', 'photo', 'address', 'city', 'country']);
    }

}
