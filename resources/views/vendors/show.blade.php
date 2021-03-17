@extends('layouts.dashboard')

@section('content')
    @php
        $page = "Profile";
        $breadcumbs = ['Dashboard' => route('home', $prefix), $vendor->name => route('members.show', [$prefix, $vendor->id])];
    @endphp
    @if(request('payments'))
        <script>
            setTimeout(() => {
                document.querySelector('#payments-tab').click()
            })
        </script>
    @endif
    @if(request('credits'))
        <script>
            setTimeout(() => {
                document.querySelector('#credits-tab').click()
            })
        </script>
    @endif
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header h4 text-dark font-weight-bold">{{ __('general.Details') }}</div>
                <div class="card-body p-0">
                    <img class="img-fluid w-100" src="{{ makeProfileImg($vendor->photo, true) }}">
                </div>
                <div class="card-footer">
                    <div class="col-md-12 d-flex justify-content-center">
                        <a href="{{ route('members.index', [$prefix, $vendor->id, 'edit' => 'edit', 'user' => $vendor->id]) }}" class="btn btn-warning d-inline-block mr-2"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                        <form class="d-inline-block" method="POST" action="{{ route('members.destroy', [$prefix, $vendor->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button onclick="confirm('{{ __('general.Are you sure?') }}') || event.preventDefault()" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('general.Delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-regular">
                <ul class="nav nav-tabs " id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">{{ __('general.Overview') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">{{ __('general.Information') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab" aria-controls="payments" aria-selected="false">{{ __('general.Payments') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="credits-tab" data-toggle="tab" href="#credits" role="tab" aria-controls="credits" aria-selected="false">{{ __('pages.Credits') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">{{ __('general.About') }}</a>
                    </li>
                </ul>
                <div class="tab-content bg-light" id="myTabContent">
                    <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">{{ __('vendors.Total paid to this vendor') }}</h5>
                                                <h2 class="mb-0"> {{ $website->currency ?? '' . $total_paid }}</h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                                <i class="fa fa-money-bill-alt fa-fw fa-sm text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">{{ __('vendors.Total Credits by this vendor') }}</h5>
                                                <h2 class="mb-0"> {{ $website->currency ?? '' . $total_credits }}</h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                <i class="fa fa-dollar-sign fa-fw fa-sm text-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Total Sold Products</h5>
                                                <h2 class="mb-0"> $149.00</h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                                <i class="fa fa-box fa-fw fa-sm text-secondary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header h4 text-dark font-weight-bold">{{ __('general.More information') }}</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Name') }}</span> {{ $vendor->name }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Email') }}</span> {{ $vendor->email }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.CNE') }}</span> {{ $vendor->cne }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $vendor->phone }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.City') }}</span> {{ $vendor->city }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Address') }}</span> {{ $vendor->address }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $vendor->phone }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Country') }}</span> {{ $vendor->country }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Subscription') }}</span> <a href="{{ route('subscriptions.index', [$prefix]) }}">{{ $vendor->subscription->name }}</a></p>
                                            <p class="w-100" title="{{ $vendor->updated_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Joined at') }}</span> {{ $vendor->created_at }}</p>
                                            <p class="w-100" title="{{ $vendor->created_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Updated at') }}</span> {{ $vendor->updated_at }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Status') }}</span> {{ $vendor->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header h4 text-dark font-weight-bold">{{ __('general.More information') }}</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Name') }}</span> {{ $vendor->name }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Email') }}</span> {{ $vendor->email }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.CNE') }}</span> {{ $vendor->cne }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $vendor->phone }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.City') }}</span> {{ $vendor->city }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Address') }}</span> {{ $vendor->address }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $vendor->phone }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Country') }}</span> {{ $vendor->country }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Subscription') }}</span> <a href="{{ route('subscriptions.index', [$prefix]) }}">{{ $vendor->subscription->name }}</a></p>
                                            <p class="w-100" title="{{ $vendor->updated_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Joined at') }}</span> {{ $vendor->created_at }}</p>
                                            <p class="w-100" title="{{ $vendor->created_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Updated at') }}</span> {{ $vendor->updated_at }}</p>
                                            <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Status') }}</span> {{ $vendor->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                        <div class="col-md-12">
                            <div class="bg-light pb-0">
                                <div class="card-body p-0">
                                    @livewire('payments.index')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="credits" role="tabpanel" aria-labelledby="credits-tab">
                        <div class="col-md-12">
                            <div class="bg-light pb-0">
                                <div class="card-body p-0">
                                    @livewire('credits.index')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header h4 text-dark font-weight-bold">{{ __('auth.About') }}</div>
                                <div class="card-body">
                                    <p>{{ $vendor->note }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1>ToDos</h1>
    <ul>
        <li>Charts with percentage of payments of subscriptions and products</li>
        <li>Invoices</li>
    </ul>
@endsection
