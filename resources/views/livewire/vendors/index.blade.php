<div wire:poll.5s>
@include('partials.toastr')
@if($current === "index")
    <!-- Search Bar -->
        <div class="row">
            <div class="col-md-4">
                <input type="search" wire:model="search" class="form-control input" placeholder="{{ __('general.Search') }}">
            </div>
            <div class="col-md-2">
                <a href="{{ route('vendors.create', $prefix) }}" class="btn btn-primary mt-1"><i class="fa fa-plus-circle"></i> {{ __('general.Add') }} </a>
            </div>
            <div class="col-md-6">
                <p class="text-right">{{ $vendors->count() . ' ' . __('general.Results') }}</p>
            </div>
        </div>
        <!-- / Search Bar -->

        <!-- vendors Boxes -->
        <div class="row mt-4">
            @foreach($vendors as $vendor)
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ makeProfileImg($vendor->photo, true) }}" class="img-fluid profile-img">
                            </div>
                            <p class="text-dark text-center h5 mt-2 font-bold">{{ $vendor->name }}</p>
                            <p class="text-center my-0"><i class="fa fa-map-marker-alt"></i> {{ $vendor->city }}</p>
                            <p class="text-center my-0"><i class="fa fa-phone"></i> {{ $vendor->phone }}</p>
                        </div>
                        <div class="card-footer w-100 mx-auto">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('vendors.show', [$prefix, $vendor->id]) }}" class="btn btn-primary btn-sm mx-1">{{ __('general.Show') }}</a>
                                <a wire:click="edit({{ $vendor->id }})" class="btn btn-warning btn-sm mx-1">{{ __('general.Edit') }}</a>
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm mx-1" onclick="return confirm('{{ __('general.Are you sure?') . ' ' .
                                    __('members.All the related records to this member will be deleted, Would you like to continue?') }}'),
                                    confirm('{{ __('general.Are you sure?') . ' ' . __('members.All the related records to this member will be deleted, Would you like to continue?') }}')
                                    || event.stopImmediatePropagation()" wire:click="delete({{ $vendor->id }})">
                                    {{ __('general.Delete') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $vendors->links() }}
        </div>
        <!-- / vendors Boxes -->
    @elseif($current === "edit")
        @include('partials.errors')
        <form wire:submit.prevent="update()" enctype="multipart/form-data" class="bg-light p-4">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-right mb-3" wire:click="$set('current', 'index')" style="cursor: pointer"><i class="fa fa-times"></i> Close </p>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark h4 text-light text-center"><i class="fa fa-user-circle"></i> {{ __('vendors.Vendor details') }}</div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center mb-2">
                                <img class="img-fluid profile-img" src="{{ makeProfileImg($photo, true) }}">
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.Name') }}
                                    <input class="form-control input" wire:model="name" placeholder="{{ __('auth.Name') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.Phone') }}
                                    <input class="form-control input" wire:model="phone" placeholder="{{ __('auth.Phone') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.ID') }}
                                    <input class="form-control input" wire:model="cni" placeholder="{{ __('auth.ID') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.Photo') }}
                                    <input wire:model="photo_file" class="form-control" type="file">
                                </label>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark h4 text-light text-center"><i class="fa fa-map-marker-alt"></i> {{ __('vendors.Vendor address') }}</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.Email') }}
                                    <input class="form-control input" wire:model="email" placeholder="{{ __('auth.Email') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.Country') }}
                                    <input class="form-control input" wire:model="country" placeholder="{{ __('auth.Country') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.City') }}
                                    <input class="form-control input" wire:model="city" placeholder="{{ __('auth.City') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.Address') }}
                                    <input class="form-control input" wire:model="address" placeholder="{{ __('auth.Address') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">{{ __('auth.Zip') }}
                                    <input class="form-control input" wire:model="zip" placeholder="{{ __('auth.Zip') }}">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-dark h4 text-light text-center"><i class="fa fa-sticky-note"></i> {{ __('vendors.Note') }}</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="text-dark w-100">{{ __('vendors.Note') }}
                                    <textarea wire:model="note" class="form-control" rows="3"></textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="p-0">
                <li class="d-inline-block">
                    <button type="submit" class="btn btn-dark text-light">{{ __('general.Save') }}</button>
                </li>
                <li class="d-inline-block">
                    <button type="reset" class="btn btn-warning">{{ __('general.Cancel') }}</button>
                </li>
            </ul>
        </form>
    @endif
</div>
