<div>
    @include('partials.errors')
    @include('partials.toastr')
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-dark font-weight-bold">{{ __('staves.Staff information') }}</p>
                        <div class="form-group d-flex justify-content-center">
                            <img class="img-fluid profile-img" src="{{ makeProfileImg($photo_url, true) }}">
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Name') }}
                                <input wire:model="name" type="text" class="form-control input">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Email') }}
                                <input wire:model="email" type="email" class="form-control input">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Phone') }}
                                <input wire:model="phone" type="text" class="form-control input">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.CNE') }}
                                <input wire:model="cne" type="text" class="form-control input">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="text-dark font-weight-bold">{{ __('auth.Address') }}</p>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Address') }}
                                <input wire:model="address" type="text" class="form-control input">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.City') }}
                                <input wire:model="city" type="text" class="form-control input">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Country') }}
                                <select wire:model="country" class="form-control" style="height: 49px">
                                    @include('partials.countries')
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100" for="photo_upload">{{ __('auth.Photo') }}</label>
                            <input wire:model="photo" type="file" id="photo_upload" class="btn btn-primary mt-2 w-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-1 pl-0">
                    <button class="btn-main text-light w-100" style="cursor: pointer">{{ __('general.Save') }}</button>
                </div>
            </div>
        </div>
    </form>
    @if($errors->has('yourpassword') OR $errors->has('newpassword'))
        @include('partials.errors')
    @endif
    <form wire:submit.prevent="changePassword">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-dark font-weight-bold">{{ __('auth.Passwordd') }}</p>
                        <div class="form-group">
                            <label for="yourpassword">{{ __('staves.Your password') }}</label>
                            <input wire:model="yourpassword" id="yourpassword" class="form-control input" type="password">
                        </div>
                        <div class="form-group">
                            <label for="newpassword">{{ __('staves.New Password') }}</label>
                            <input wire:model="newpassword" id="newpassword" class="form-control input" type="password">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 pl-0">
                    <button class="btn-main text-light w-100" style="cursor: pointer">{{ __('settings.Change Password') }}</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-dark font-weight-bold">{{ __('auth.Role') . ' & ' . __('auth.Permissions') }}</p>
                    <p class="text-dark font-weight-bold">
                        <span class="badge badge-brand">{{ $staff->role->name }}</span>
                    </p>
                    <div class="form-group">
                        @include('partials.permissions', ['permissions' => $staff->role->permissions])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
