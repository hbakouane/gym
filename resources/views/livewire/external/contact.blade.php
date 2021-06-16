<div class="{{ $class ?? '' }} py-10" id="contact" style="background-image: url('external/contact-background.png'); background-size: cover;">
    <div class="container">
        <div class="row py-10">
            <div class="col-md-6 my-auto mx-auto">
                <p class="h1 text-light">Have a question? <br /> Contact Us!</p>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
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
                                            <input class="form-control border" wire:model='name' placeholder="{{ __('auth.Name') }}">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="w-100">
                                            <input wire:model='email' class="form-control border" type="email" placeholder="{{ __('auth.Email') }}">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="w-100">
                                    <input class="form-control border" wire:model='subject' placeholder="{{ __('auth.Subject') }}">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="w-100">
                                    <textarea rows="5" wire:model='message' class="form-control border" placeholder="{{ __('auth.Message') }}"></textarea>
                                </label>
                            </div>
                            <button class="btn btn-main border mb-3">{{ __('general.Send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
