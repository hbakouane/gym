<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $country;
    public $city;
    public $profile_img;
    public $profile_img_path;
    public $rules = [
        'name' => 'required',
        'phone' => 'required',
    ];

    // Toastr
    public $type = "success";
    public $toastr = false;
    public $message = '';

    // Password
    public $old;
    public $password;
    public $password_confirmation;
    public $passwordRules = [
      'old' => 'required',
      'password' => 'required|min:8|confirmed',
      'password_confirmation' => 'required|min:8',
    ];

    // After resetting the password
    public $passwordReset = false;
    public $seconds = 5;

    public function __construct()
    {
        $user = auth()->user();
        $this->user = $user;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->country = $user->country;
        $this->city = $user->city;
        $this->profile_img_path = auth()->user()->profile_img;
    }

    public function render()
    {
        return view('livewire.users.settings');
    }

    public function save()
    {
        $this->validate($this->rules);
        $user = auth()->user();
        // Deal with the profile image
        if ($this->profile_img) {
            // Delete the old photo if it exists
            if (!empty($this->user->profile_img)) {
                // Generate old image link without the domain name
                $old_file = Str::after($user->profile_img, env('APP_URL') . '/storage/');
                // Make the right path for the delete() method
                $old_file_path = 'public/' . $old_file;
                Storage::delete($old_file_path);
            }
            // Upload the file
            $filename = $this->profile_img->store('public/photos');
            $img_url = url(Storage::url($filename));
            $this->profile_img_path = $img_url;
        }

        $user->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'country'=> $this->country,
            'city'=> $this->city,
            'profile_img'=> $img_url ?? $this->profile_img,
        ]);
        $this->message = __('settings.Information changed successfully.');
        return $this->toastr = true;
    }

    public function changePassword()
    {
        $user = auth()->user();
        $this->validate($this->passwordRules);

        // check if the new password matches the old one
        if (Hash::check($this->old, $user->password)) {
            // Make a new password
            $new_password = Hash::make($this->password);
            $user->update(['password' => $new_password]);
            $this->toastr = true;
            $this->type = "success";
            $this->message = __('settings.Password changed successfully.');
            $this->passwordReset = true;
        } else {
            $this->type = 'error';
            $this->message = __('settings.Your old password doesn\'t match your new one.');
            return $this->toastr = true;
        }
    }
}
