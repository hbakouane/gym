<?php

namespace App\Http\Livewire\Vendors;

use App\Http\Controllers\RolesController;
use App\Models\Credit;
use App\Models\Payment;
use App\Models\Vendor as Member;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{

    /*
     *
     * This file has been duplicated from App/Http/livewire/members/Index.php
     * as well as the Create.php
     * and the views
     *
     */

    use WithFileUploads, WithPagination;

    public $prefix;
    public $project_id;
    public $search;

    // Toastr
    public $toastr = false;
    public $type;
    public $message;

    // Pagination settings
    public $pagination = 15;
    protected $paginationTheme = "bootstrap";

    // For pages toggling
    public $current = "index";

    // User information
    public $user;
    public $name;
    public $phone;
    public $cni;
    public $photo; // For the photo url coming from the DB
    public $email;
    public $country;
    public $city;
    public $address;
    public $zip;
    public $note;
    public $photo_file; // for the uploaded photo

    // Rules for validation
    public $rules = [
        'name' => 'required',
        'photo_file' => 'nullable|image|mimes:png,jpg,jpeg,gif'
    ];

    public function render()
    {
        if (!empty($this->search)) {
            $members = Member::whereHas('project', function (Builder $query) {
                $query->where('project', $this->prefix)->where('user_id', getAdmin()->id);
            })->where('name', 'like', "%$this->search%")
                ->orWhere('phone', 'like', "%$this->search%")
                ->orWhere('email', 'like', "%$this->search%")
                ->orWhere('address', 'like', "%$this->search%")
                ->orWhere('cne', 'like', "%$this->search%")
                ->orWhere('city', 'like', "%$this->search%")
                ->orderBy('id', 'DESC')
                ->paginate($this->pagination);
        } else {
            $members = Member::whereHas('project', function (Builder $query) {
                $query->where('project', $this->prefix)->where('user_id', getAdmin()->id);
            })->orderBy('id', 'DESC')->paginate($this->pagination);
        }

        return view('livewire.vendors.index', ['vendors' => $members]);
    }

    public function mount()
    {
        if (request('edit')) {
            $this->current = "edit";
            $this->edit(request('user'));
        }
        $this->project_id = Project::where('project', $this->prefix)->first();
    }

    public function edit($id) {
        $this->current = "edit";
        $user = Member::where('id', $id)->first();
        $this->user = $user;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->cni = $user->cne;
        $this->photo = $user->photo;
        $this->email = $user->email;
        $this->country = $user->country;
        $this->city = $user->city;
        $this->address = $user->address;
        $this->zip = $user->zip;
        $this->note = $user->note;
    }

    public function update()
    {
        $this->validate($this->rules);

        // Deal with the profile image
        if ($this->photo_file) {
            $old_photo = Str::after($this->photo, env('APP_URL') . '/storage/');
            if ($this->photo) {
                Storage::delete('public/'.$old_photo);
            }
            $file = $this->photo_file->store('public/members');
            $filepath = url(Storage::url($file));
        }

        // Handle the update
        $this->user->fill([
            'name' => $this->name,
            'phone' => $this->phone,
            'cne' => $this->cni,
            'photo' => $filepath ?? $this->photo,
            'email' => $this->email,
            'address' => $this->address,
            'zip' => $this->zip,
            'city' => $this->city,
            'country' => $this->country,
            'note' => $this->note,
            'project_id' => $this->project_id->id
        ])->save();

        // If there is an edit GET var, it means that we are coming from
        // the route('members.show'), so we have to get back when we update the records
        if (request('user')) {
            return redirect()->to(route('members.show', [$this->project_id->id, $this->user->id]));
        }

        // Return to the index
        $this->current ="index";

        // Toast success
        $this->message = __('members.Information updated successfully.');
        $this->type = "success";
        $this->toastr = true;
    }

    public function delete($id)
    {
        RolesController::checkRole('vendors.delete');
        Member::find($id)->delete(); // Even though we wrote Member::delete, we delete the vendor because we use The Member Vendor as Member see on the top
        // Delete the payable as well
        $payments = Payment::where('payable_type', 'App\Models\Vendor')->where('payable_id', $id)->delete();
        $credits = Credit::where('creditable_type', 'App\Models\Vendor')->where('creditable_id', $id)->delete();

        $this->toastr = true;
        $this->type = "success";
        $this->message = __("general.Vendor deleted successfully.");
    }
}
