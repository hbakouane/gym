<div class="{{ $class ?? '' }}" id="contact">
    <div class="container">
        <p class="h2 text-center {{ $text ?? '' }}">{{ __('external.Contact us') }}</p>
        @if($sent)
        <div class="alert alert-success">
            <strong>{{ __('external.Message sent successfully!') }}</strong>
        </div>
        @endif
        @include('partials.errors')
        <form wire:submit.prevent="sendEmail">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="w-100">
                            <input class="form-control" wire:model='name' placeholder="{{ __('auth.Name') }}">
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="w-100">
                            <input wire:model='email' class="form-control" type="email" placeholder="{{ __('auth.Email') }}">
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="w-100">
                    <input class="form-control" wire:model='subject' placeholder="{{ __('auth.Subject') }}">
                </label>
            </div>
            <div class="form-group">
                <label class="w-100">
                    <textarea rows="5" wire:model='message' class="form-control" placeholder="{{ __('auth.Message') }}"></textarea>
                </label>
            </div>
            <button class="btn btn-light border mb-3">{{ __('general.Send') }}</button>
        </form>
    </div>
</div>
