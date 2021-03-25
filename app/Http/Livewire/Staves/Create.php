<?php

namespace App\Http\Livewire\Staves;

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
    public $city;
    public $country;

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
        return view('livewire.staves.create');
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
        ])->save();

        // Toast success
        $this->message = __('staves.Staff added successfully.');
        $this->type = 'success';
        $this->toastr = true;

        // Reset all the properties but the toast ones
        $this->reset(['name', 'email', 'phone', 'cne', 'photo', 'address', 'city', 'country']);
    }

}
