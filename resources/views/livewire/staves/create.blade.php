<div>
    @include('partials.errors')
    @include('partials.toastr')
     <form wire:submit.prevent="save">
         <div class="card">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-6">
                         <p class="text-dark font-weight-bold">{{ __('staves.Staff information') }}</p>
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
                             <label class="w-100">{{ __('auth.Passwordd') }}
                                 <input wire:model="password" type="password" class="form-control input">
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
                                <input wire:model="city" class="form-control input">
                             </label>
                         </div>
                         <div class="form-group">
                             <label class="w-100">{{ __('auth.Country') }}
                                 <select wire:model="country" class="form-control" style="height: 49px">
                                     @include('partials.countries')
                                 </select>
                             </label>
                         <div class="form-group">
                             <label class="w-100" for="photo_upload">{{ __('auth.Photo') }}</label>
                             <input wire:model="photo" type="file" id="photo_upload" class="btn btn-primary mt-2 w-100">
                         </div>
                         </div>
                         <div class="form-group">
                             <label class="w-100">{{ __('auth.Role') }}
                                 @if(filled($roles))
                                 <select wire:model="role_id" class="form-control" style="height: 49px">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                    <div class="w-100">
                                        <p>
                                            {{ __('roles.You don\'t have roles, create them to start assigning them to staves') }}
                                        </p>
                                        <a href="{{ route('roles.create', $prefix) }}">{{ __('roles.Create roles') }}</a>
                                    </div>
                                @endif
                             </label>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-1 pl-0">
                     <button class="btn-main text-light w-100" style="cursor: pointer">{{ __('general.Save') }}</button>
                 </div>
             </div>
         </div>
     </form>
</div>
