<div>
    @include('partials.errors')
    @include('partials.toastr')
    <div class="card">
        <div class="card-body">
            <p class="text-dark font-bold font-20">{{ __('website.Project settings') }}</p>
            <form wire:submit.prevent="save">
                <div class="form-group">
                      <label class="w-100">{{ __('project.Project Name') }}
                          <input wire:model="name" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Address') }}
                          <input wire:model="address" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.City') }}
                          <input wire:model="city" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Zip') }}
                          <input wire:model="zip" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Country') }}
                          <select wire:model="country" class="form-control" style="height: 49px">
                              @include('partials.countries')
                          </select>
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Currency') }}
                          <input wire:model="currency" type="text" class="form-control input">
                      </label>
                </div>
                <button class="btn btn-main text-light">{{ __('general.Save') }}</button>
            </form>
        </div>
    </div>
</div>
