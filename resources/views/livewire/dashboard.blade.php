<div>
    @if (staffHasRole('home.allowed'))
    <p class="text-muted text-right" style="cursor: pointer" wire:click="$toggle('filter')">{!! $filter ? '<i class="fa fa-times"></i>' : '<i class="fa fa-info-circle"></i>' !!} {{ __('general.More') }}</p>
    @if($filter)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form wire:submit.prevent="redefine('{{ $date_pick }}')" class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    {{ __('general.Pick up a day') }} <input wire:model="date_pick" type="date" class="form-control input">
                                </div>
                            </div>
                            <button class="btn btn-light btn-lg mt-2">{{ __('general.Apply') }}</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form wire:submit.prevent="redefine(['{{ $from }}', '{{ $to }}'])" class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    {{ __('general.From') }} <input wire:model="from" type="date" class="form-control input">
                                </div>
                                <div class="col-md-5">
                                    {{ __('general.To') }} <input wire:model="to" type="date" class="form-control input">
                                </div>
                            </div>
                            <button class="btn btn-light btn-lg mt-2">{{ __('general.Apply') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="col-md-12" wire:loading>
        Loading . . .
    </div>

    <div class="row">
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('home.Revenue') }}</h5>
                        <h2 class="mb-0">{{ ($website->currency ?? '') . $revenue }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light shadow mt-1">
                        <i class="fa fa-money-bill-wave fa-fw fa-sm text-success"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('membership.Members') }}</h5>
                        <h2 class="mb-0"> {{ $members }} </h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light shadow mt-1">
                        <i class="fa fa-users fa-fw fa-sm text-info"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metrdaic -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('membership.Paid Memberships') }}</h5>
                        <h2 class="mb-0"> {{ $paidMemberships }} </h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light shadow mt-1">
                        <i class="fa fa-tags fa-fw fa-sm text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('home.Expenses') }}</h5>
                        <h2 class="mb-0"> {{ ($website->currency ?? '') . $expenses }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light shadow mt-1">
                        <i class="fa fa-coins fa-fw fa-sm text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('home.Staves') }}</h5>
                        <h2 class="mb-0"> {{ $staves }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light shadow mt-1">
                        <i class="fa fa-users-cog fa-fw fa-sm text-brand"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('home.Vendors') }}</h5>
                        <h2 class="mb-0"> {{ $vendors }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-danger-light shadow mt-1">
                        <i class="fa fa-store fa-fw fa-sm text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('home.Credits (members)') }}</h5>
                        <h2 class="mb-0"> {{ ($website->currency ?? '') . $creditsToMembers }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-light shadow mt-1">
                        <i class="fa fa-hand-holding-usd fa-fw fa-sm text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">{{ __('home.Credits (vendors)') }}</h5>
                        <h2 class="mb-0"> {{ ($website->currency ?? '') . $creditsFromVendors }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-dark shadow mt-1">
                        <i class="fa fa-hand-holding-usd fa-fw fa-sm text-light"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. metric -->
    </div>
    <!-- ============================================================== -->
    <!-- revenue  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark h5 font-weight-bold text-center">{{ __('home.Revenues and Expenses') }}</div>
                <div class="card-body">
                    {!! $revenueChart->render() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark h5 font-weight-bold text-center">{{ __('home.Summary') }}</div>
                <div class="card-body">
                    {!! $chartjs->render() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark h5 font-weight-bold text-center">{{ __('home.Staves and Vendors') }}</div>
                <div class="card-body">
                    {!! $stavesVendorsChart->render() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark h5 font-weight-bold text-center">{{ __('home.Credits') }}</div>
                <div class="card-body">
                    {!! $creditsChart->render() !!}
                </div>
            </div>
        </div>
    </div>
    @else
    <div class='alert alert-warning'>
        <strong>{{ __('roles.You are not allowed to see this page') }}</strong>
    </div>
    @endif
</div>
