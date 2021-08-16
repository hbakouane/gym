<div>
    @include('partials.toastr')
    @include('partials.errors')
    <div class="row">
        @if($showCard)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header h4 text-dark font-weight-bold w-100">{{ __('general.Details') }}</div>
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-center my-2">
                            <img class="img-fluid profile-img" src="{{ makeProfileImg($member->photo, true) }}">
                        </div>
                        <div class="px-4 py-2">
                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Name') }}</span> {{ $member->name }}</p>
                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Subscription') }}</span> <a href="{{ route('subscriptions.index', [$prefix]) }}">{{ $member->subscription->name }}</a></p>
                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Subscription price') }}</span> {{ $member->subscription->price }}</p>
                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Subscription duration') }}</span> {{ $member->subscription->duration . ' ' }} {{ $website->currency ?? '' }}</p>
                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Email') }}</span> {{ $member->email }}</p>
                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.CNE') }}</span> {{ $member->cne }}</p>
                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $member->phone }}</p>
                            <a wire:click="$toggle('more')" style="cursor: pointer">{{ $more ? __('general.Hide') : __('general.More information') }}</a>
                            @if($more)
                                <hr>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Subscription') }}</span> <a href="{{ route('subscriptions.index', [$prefix]) }}">{{ $member->subscription->name }}</a></p>
                                <p class="w-100" title="{{ $member->updated_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Joined at') }}</span> {{ $member->created_at }}</p>
                                <p class="w-100" title="{{ $member->created_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Updated at') }}</span> {{ $member->updated_at }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Status') }}</span> {{ $member->status }}</p>
                                <hr>
                                <p class="w-100 mt-3"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.City') }}</span> {{ $member->city }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Address') }}</span> {{ $member->address }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $member->phone }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Country') }}</span> {{ $member->country }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <a target="_blank" href="{{ route('members.show', [$prefix, $member->id]) }}" class="btn btn-info btn-sm">{{ __('general.Show') }}</a>
                        <a target="_blank" href="{{ route('members.index', [$prefix, $member->id, 'edit' => 'edit', 'user' => $member->id]) }}" class="btn btn-warning btn-sm">{{ __('general.Edit') }}</a>
                        <button class="btn btn-danger btn-sm" wire:click="$toggle('showCard')">{{ __('general.Cancel') }}</button>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="form-group">
                            <label class="w-100">{{ __('membership.Member') }}
                                <input wire:model="name" wire:keydown="getMember" class="form-control input">
                                @if($members and !$showCard)
                                    @foreach($members as $memberr)
                                        <div class="col-md-12 bg-light py-3 user-dropdown border @if($memberr->id === $member_id) text-primary @endif"
                                             wire:click="getOneMember({{ $memberr->id }}, true)"
                                             style="cursor: pointer"
                                        >
                                            <img class="img-fluid user-avatar-md rounded-circle" src="{{ makeProfileImg($memberr->photo, true) }}"> {{ $memberr->name }}
                                        </div>
                                    @endforeach
                                @endif
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('membership.Payment date') }}
                                <input type="date" class="form-control input" wire:model="payment_date">
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="w-100">{{ __('membership.Amount') }} ({{ __('membership.If you don\'t enter an amount, the subscription price will be applied') }})
                                        <input type="number" class="form-control input" wire:model="amount">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="w-100">{{ __('payments.Payment type') }}
                                        <input type="text" class="form-control input" wire:model="payment_type">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="w-100">{{ __('general.Starts at') }}
                                        <input type="date" class="form-control input" wire:model="starts_at">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="w-100">{{ __('general.Ends at') }}
                                        <input type="date" class="form-control input" wire:model="ends_at">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="w-100">{{ __('membership.Note') }}
                                <textarea class="form-control" rows="5" wire:model="note"></textarea>
                            </label>
                        </div>
                        <button class="btn btn-main text-light">{{ __('general.Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
