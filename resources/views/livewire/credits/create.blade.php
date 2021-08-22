<div>
    @include('partials.errors')
    @include('partials.toastr')
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
                <div class="card-header h4 text-dark font-weight-bold w-100">{{ __('credits.Credit') . ' ' . strtolower(__('general.Details')) }}</div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="custom-control custom-radio custom-control-inline" title="{{ __('payments.Payment from a member') }}">
                                        <input type="radio" wire:model="creditable_type" value="member" class="custom-control-input"><span class="custom-control-label">{{ __('members.Member') }}</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline" title="{{ __('payments.Payment to a vendor') }}">
                                        <input type="radio" wire:model="creditable_type" value="vendor" class="custom-control-input"><span class="custom-control-label">{{ __('expenses.Vendor') }}</span>
                                    </label>
                                 </div>
                            </div>
                            @if($creditable_type)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('members.Member') . ' / ' . __('vendors.Vendor') }}</label>
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('payments.Amount') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">{{ $website->currency ?? ''  }}</span>
                                        </div>
                                        <input wire:model="amount" type="number" class="form-control input" placeholder="{{ __('payments.Amount') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('payments.Payment type') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-money-bill-wave-alt"></i></span>
                                        </div>
                                        <input wire:model="payment_type" class="form-control input" placeholder="{{ __('payments.Payment type') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('payments.Payment date') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock"></i></span>
                                        </div>
                                        <input wire:model="payment_date" type="date" class="form-control input" placeholder="{{ __('payments.Payment date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="w-100">{{ __('payments.Private note') }}
                                        <textarea wire:model="note" rows="3" class="form-control input" placeholder="{{ __('payments.Note') }}"></textarea>
                                    </label>
                                </div>
                            </div>
                            @endif
                        </div>
                        <button class="btn btn-main text-light" type="submit">{{ __('general.Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
