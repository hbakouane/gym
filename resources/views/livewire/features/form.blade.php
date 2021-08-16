<div>
    @if($toastr)
        <script>
            let timeOut = 3000;
            toastr.success('{{ __('response.Feature added successfully.') }}', '',{timeOut})
            setTimeout(function () {
                let toastr = document.querySelector('#toastr_btn');
                toastr.click();
            }, timeOut);
        </script>
    @endif
    <form wire:submit.prevent="save">
        @csrf
        <button id="toastr_btn" type="button" wire:click="$toggle('toastr')"></button>
        <div class="form-group">
            <label class="w-100">{{ __('Title') }}
                <input type="text" class="form-control form-control-lg" wire:model="name" placeholder="{{ __('Title') }}">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </label>
        </div>
        <div class="form-group">
            <label class="w-100">{{ __('Description') }} <small class="text-muted">{{ __('Optional') }}</small>
                <textarea rows="5" class="form-control form-control-lg" wire:model="description" placeholder="{{ __('Description') }}"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </label>
        </div>
        <button type="submit" class="btn btn-main text-light">{{ __('Save') }}</button>
    </form>
</div>
