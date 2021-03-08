<div>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark h4 text-light text-center"><i class="fa fa-user-circle"></i> {{ __('members.Client details') }}</div>
                        <div class="card-body">
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
                                    <input class="form-control" type="file" name="photo" id="photo">
                                </label>
                            </div>
                        </div>
                    <br><br>
                </div>
            </div>
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark h4 text-light text-center"><i class="fa fa-map-marker-alt"></i> {{ __('members.Client address') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Email') }}
                                <input class="form-control input" wire:model="email" placeholder="{{ __('auth.Email') }}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Address') }}
                                <input class="form-control input" wire:model="name" placeholder="{{ __('auth.Address') }}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Zip') }}
                                <input class="form-control input" wire:model="zip" placeholder="{{ __('auth.Zip') }}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.City') }}
                                <input class="form-control input" wire:model="city" placeholder="{{ __('auth.City') }}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('auth.Country') }}
                                <input class="form-control input" wire:model="country" placeholder="{{ __('auth.Country') }}">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark h4 text-light text-center"><i class="fa fa-money-check"></i> {{ __('members.Client subscription') }}</div>
                    <div class="card-body">
                        @if(!filled($subscriptions))
                            <p>
                                {{ __('members.No subscriptions found.') }}
                                <a class="text-main" href="{{ route('subscriptions.create', $prefix) }}">{{ __('general.Create') }}</a>
                            </p>
                        @else
                            <div class="form-group">
                                <label class="text-dark">{{ __('plan.Choose a subscription') }}</label><br>
                                @foreach($subscriptions as $subscription)
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" wire:model="subscription_id" value="{{ $subscription->id }}" class="custom-control-input"><span class="custom-control-label">{{ $subscription->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark h4 text-light text-center"><i class="fa fa-sticky-note"></i> {{ __('members.Note') }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text-dark w-100">{{ __('members.Note') }}
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
                <button type="reset" class="btn btn-warning text-light">{{ __('general.Cancel') }}</button>
            </li>
        </ul>
    </form>
</div>
