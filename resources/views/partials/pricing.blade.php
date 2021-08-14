<style>
    .main {
        box-shadow: 0 0 24px rgba(0, 0, 0, 0.15);
        font-family: "Open Sans";
        width: 1170px;
        margin: 0 auto;
    }
    .price-table {
        width: 100%;
        border-collapse: collapse;
        border: 0 none;
    }
    .price-table tr:not(:last-child) {
        border-bottom: 1px solid rgba(0, 0, 0, 0.03);
    }
    .price-table tr td {
        border-left: 1px solid rgba(0, 0, 0, 0.05);
        padding: 8px 24px;
        font-size: 14px;
    }
    .price-table tr td:first-child {
        border-left: 0 none;
    }
    .price-table tr td:not(:first-child) {
        text-align: center;
    }
    .price-table tr:nth-child(even) {
        background-color: #FFFFFF;
    }
    .price-table tr:hover {
        background-color: #EEEEEE;
    }
    .price-table .fa-check text-success {
        color: #3d405c !important;
    }
    .price-table .fa-times text-danger {
        color: #D8D6E3;
    }

    /* Highlighted column */
    .price-table tr:nth-child(2n) td:nth-child(3) {
        background-color: rgba(216, 214, 227, 0.25);
    }
    .price-table tr td:nth-child(3) {
        background-color: rgba(216, 214, 227, 0.15);
        padding: 8px 48px;
    }
    .price-table tr td:nth-child(3) .fa-check text-success,
    .price-table tr:nth-child(2n) td:nth-child(3) .fa-check text-success {
        /* color: #ffffff; */
    }
    /**/

    .price-table tr.price-table-head td {
        font-size: 16px;
        font-weight: 600;
        font-family: "Montserrat";
        text-transform: uppercase;
    }
    .price-table tr.price-table-head {
        background-color: #3d405c !important;
        color: #FFFFFF;
    }
    .price-table td.price {
        color: #f43f54;
        padding: 16px 24px;
        font-size: 20px;
        font-weight: 600;
        font-family: "Montserrat";
    }
    .price-table td.price a {
        background-color: #3d405c !important;
        color: #FFFFFF;
        padding: 12px 32px;
        margin-top: 16px;
        font-size: 12px;
        font-weight: 600;
        font-family: "Montserrat";
        text-transform: uppercase;
        display: inline-block;
        border-radius: 64px;
    }
    .price-table td.price-table-popular {
        font-family: "Montserrat";
        border-top: 3px solid #3d405c !important;
        color: #3d405c !important;
        text-transform: uppercase;
        font-size: 12px;
        padding: 12px 48px;
        font-weight: 700;
    }
    .price-table .price-blank {
        background-color: #fafafa;
        border: 0 none;
    }

    .price-table svg {
        width: 90px;
        fill: #3d405c !important;
    }
</style>
@php
    // Get the plans so we can get their IDs
    $plan1 = \App\Models\Plan::where('price', '9.99')->first();
    $plan2 = \App\Models\Plan::where('price', '24.99')->first();
    $plan3 = \App\Models\Plan::where('price', '49.99')->first();

    if (request('coupon')) {
        $coupon = request('coupon');
        $coupon = \App\Models\Coupon::where('name', $coupon)->first();
        // Apply the coun code if exists
        if (!empty($coupon)) {
            $plan1->price = number_format($plan1->price - ($plan1->price * $coupon->percentage * 1 / 100), 2, '.');
            $plan2->price = number_format($plan2->price - ($plan2->price * $coupon->percentage * 1 / 100), 2, '.');
            $plan3->price = number_format($plan3->price - ($plan3->price * $coupon->percentage * 1 / 100), 2, '.');
        }
    }

    // Get the cheapest plan
    $cheapest = \App\Models\Plan::orderBy('price', 'ASC')->first();

    // Get the projects that have been already 'free-trialed'
    $free_trial_projects = \App\Models\Project::where('user_id', auth()->id())->where('trial', true)->get();
@endphp
@if(count($free_trial_projects) == 0)
    <p class="h3 text-center text-dark font-weight-bold pb-3">{{ __('saas.Pick a Plan, Try it free for 7 Days') }}</p>
    <p class="h5 mt-0 pt-0 text-center mb-3 text-muted">{{ __('external.credit-card') }}</p>
@else
    <p class="h1 text-center text-dark font-weight-bold pb-3">{{ __('saas.Our plans start from') . " $$cheapest->price" }}</p>
@endif
<style>
    #secondStep {
        display: none;
    }
</style>
@php
    $free_trial_projects = \App\Models\Project::where('user_id', auth()->id())->where('trial', true)->get();
@endphp
<script>
    // Get the GET vars
    var $_GET = {};
    if(document.location.toString().indexOf('?') !== -1) {
        var query = document.location
                    .toString()
                    // get the query string
                    .replace(/^.*?\?/, '')
                    // and remove any existing hash string (thanks, @vrijdenker)
                    .replace(/#.*$/, '')
                    .split('&');

        for(var i=0, l=query.length; i<l; i++) {
        var aux = decodeURIComponent(query[i]).split('=');
        $_GET[aux[0]] = aux[1];
        }
    }

    function selectPlan(id, price) {
        let firstStep = document.querySelector('#firstStep');
        let secondStep = document.querySelector('#secondStep');

        firstStep.style.display = 'none';
        secondStep.style.display = 'block';

        let plan = document.querySelector('#plan');
        plan.value = id;
        if ({{ count($free_trial_projects) }} == 0 && !$_GET['upgrade']) {
            document.getElementById('secondForm').submit()
        }
    }
    function reverse() {
        let firstStep = document.querySelector('#firstStep');
        let secondStep = document.querySelector('#secondStep')
        firstStep.style.display = 'block';
        secondStep.style.display = 'none';
    }
</script>
<div class="main" id="firstStep">
    <table class="price-table rounded">
        <tbody>
        <tr>
            <td class="price-blank"></td>
            <td class="price-blank"></td>
            <td class="price-table-popular">Most popular</td>
            <td class="price-blank"></td>
        </tr>
        <tr class="price-table-head">
            <td>
            </td>
            <td>
                {{ __('saas.Starter') }}
                <br><small style="font-size: 12px; font-weight: 400;">Starter plan</small>
            </td>
            <td>
                {{ __('saas.Standard') }}
                <br><small style="font-size: 12px; font-weight: 400;">Longer data retention</small>
            </td>
            <td class="green-width">
                {{ __('saas.Professional') }}
                <br><small style="font-size: 12px; font-weight: 400;">Our complete solution</small>
            </td>
        </tr>
        <tr>
            <td>
                <p class="text-dark font-weight-bold mb-0">{{ __('saas.Do you have a coupon code?') }}</p>
                <form method="GET" action="">
                    <input type="hidden" name="project" value="{{ request('project') }}">
                    <input class="form-control input w-100" name="coupon" placeholder="{{ __('saas.Coupon code') }}">
                    <button class="btn btn-outline-secondary rounded-pill btn-sm mt-2">{{ __('general.Submit') }}</button>
                </form>
            </td>
            <td class="price">
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 128 128">
                    <defs/>
                    <path d="M76.1 91.4V71.7a1 1 0 00-.2-.6l-5.7-6.9V15.4a1.1 1.1 0 00-.1-.4.5.5 0 000-.1l-5.8-10a1 1 0 00-1.7 0l-5.9 10a.5.5 0 000 .1 1.2 1.2 0 00-.1.4v48.8l-5.7 6.9a1 1 0 00-.2.6v19.7a1 1 0 001 1h10.6V95a1 1 0 102 0v-2.7h10.8a1 1 0 001-1zm-17.6-75h9.7v4h-9.7zm4.8-9l4.1 7h-8.1zM52.6 72l4-4.8v23h-4zm11.7 18.3V56.7a1 1 0 10-2 0v33.7h-3.8v-68h9.7v68zm9.8 0h-4v-23l4 4.7z"/>
                    <path d="M59 94.7a1 1 0 00-1 1v10.9a4.2 4.2 0 00-3.3 2.7 1 1 0 00.6 1.3 1 1 0 00.4 0 1 1 0 001-.6 2.2 2.2 0 012.8-1.4 1 1 0 10.7-1.9H60v-11a1 1 0 00-1-1zM68.7 101.2v-5.5a1 1 0 00-2 0v5.5a1 1 0 102 0zM60.2 112.8a1.4 1.4 0 011.3 1 1 1 0 001.9.3 2.5 2.5 0 014.7 1.4 1 1 0 002 0 4.6 4.6 0 00-7.4-3.6 3.4 3.4 0 00-2.5-1.1 1 1 0 000 2zM73.2 109.7a1 1 0 002 0 6.1 6.1 0 00-6.1-6.1 1 1 0 000 2 4.1 4.1 0 014.1 4zM105.2 109a9.8 9.8 0 00-19-3 6.4 6.4 0 00-2.8-.7 6.5 6.5 0 00-6.5 6.5 1 1 0 002 0 4.5 4.5 0 014.5-4.5 4.4 4.4 0 012.8 1 1 1 0 001.6-.6 7.8 7.8 0 0115.4 1.4 1 1 0 002 0zM7.8 123a8 8 0 006.2-.1 1 1 0 00-.8-1.8 6 6 0 01-8-3 6 6 0 012.9-8 9.4 9.4 0 001.5.8 1 1 0 00.4.1 1 1 0 00.4-2 7.5 7.5 0 01-1-13.2 1 1 0 00.1-1.6A4.2 4.2 0 018.1 91a4.2 4.2 0 017.1-3 1 1 0 001 .2 1 1 0 00.6-.6 5.8 5.8 0 0111.3 1.1A7.4 7.4 0 0022 96a1 1 0 002 0 5.4 5.4 0 118.6 4.4 8.9 8.9 0 00-5.4 7 6.6 6.6 0 00-1 0 6.4 6.4 0 00-4.5 1.9 1 1 0 000 1.4 1 1 0 001.4 0 4.4 4.4 0 017.5 3.1 1 1 0 002 0 6.4 6.4 0 00-3.4-5.7 6.8 6.8 0 014.2-5.9 6.8 6.8 0 019.4 5.9 1 1 0 001.4.8 4.8 4.8 0 011.8-.3 5 5 0 015 5 1 1 0 002 0 7 7 0 00-8.4-6.9 8.9 8.9 0 00-8.6-7h-.2a7.4 7.4 0 00-5.7-11.1 7.8 7.8 0 00-14.6-2.9 6.2 6.2 0 00-3.2-.9 6.2 6.2 0 00-5 10 9.4 9.4 0 00-1 13.9 8.1 8.1 0 00-3.3 4A8 8 0 007.8 123zM91.8 119.8a1 1 0 002 0 6.4 6.4 0 00-11-4.5 1 1 0 000 1.4 1 1 0 001.4 0 4.4 4.4 0 013.1-1.3 4.4 4.4 0 014.5 4.4zM125.4 103.3a7.7 7.7 0 00-3.4-6.4 8.1 8.1 0 00.7-3.3A8.3 8.3 0 00107 90a5.8 5.8 0 00-4 10.6 1 1 0 101.1-1.7 3.8 3.8 0 013.2-6.8 1 1 0 001.2-.6 6.3 6.3 0 0112.2 2 6.2 6.2 0 01-1 3.3 1 1 0 000 .8 1 1 0 00.5.6 5.6 5.6 0 011 9.5 8.4 8.4 0 00-2.8-1.6 1 1 0 10-.6 1.8 6.7 6.7 0 01-.4 12.8 1 1 0 00-.7 1.2 1 1 0 001 .8 1.1 1.1 0 00.2 0A8.7 8.7 0 00124 112a8.7 8.7 0 00-1.3-2.8 7.6 7.6 0 002.7-6z"/>
                </svg>
                <br>${{ $plan1->price }}/mo
                <br>
                @if(request('upgrade') == true)
                    <a onclick="selectPlan({{ $plan1->id }}, {{ $plan1->price }})" class="btn btn-main"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }}</a>
                @elseif(count($free_trial_projects) == 0)
                    <a onclick="selectPlan({{ $plan1->id }}, {{ $plan1->price }})" class="btn btn-main">{{ __('saas.7 Days Free Trial') }}</a>
                @else
                    <a onclick="selectPlan({{ $plan1->id }}, {{ $plan1->price }})" class="btn btn-main">{{ __('saas.Subscribe') }}</a>
                @endif
            </td>
            <td class="price">
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 128 128">
                    <defs/>
                    <path d="M62.6 103.3a1 1 0 00-1.4 0L44 120.8a1 1 0 000 1.4 1 1 0 00.7.3 1 1 0 00.7-.3l17.3-17.3a1 1 0 000-1.5zM58.7 116.3a1 1 0 00.7-.3l7.2-7.2a1 1 0 00-1.4-1.5l-7.2 7.3a1 1 0 00.7 1.7zM55.2 117.4l-2.8 2.8a1 1 0 00.7 1.7 1 1 0 00.7-.3l2.8-2.8a1 1 0 000-1.4 1 1 0 00-1.4 0zM5.9 84.1a1 1 0 00.7.3 1 1 0 00.7-.3l17.4-17.3a1 1 0 10-1.5-1.4L6 82.7a1 1 0 000 1.4zM13.4 70l7.3-7.2a1 1 0 10-1.5-1.4L12 68.6a1 1 0 00.7 1.7 1 1 0 00.7-.3zM7.8 75.6l2.8-2.8a1 1 0 000-1.4 1 1 0 00-1.4 0l-2.8 2.8a1 1 0 000 1.4 1 1 0 00.7.3 1 1 0 00.7-.3zM68 33.6L27.1 40a1 1 0 00-.5.3L20 46.8a1 1 0 000 1.5l16.6 16.6-4.7 4.7a1 1 0 000 1.5l11.5 11.4-4.6 4.6a1 1 0 00.7 1.7 1 1 0 00.7-.3l4.6-4.6L57 96a1 1 0 001.4 0l4.7-4.7 16.7 16.6a1 1 0 001.4 0l6-6 .5-.5a1 1 0 00.3-.6L94.4 60l20.3-20.3a22.8 22.8 0 006-10.3.6.6 0 000-.2 22 22 0 00.5-3.4l1.1-11.3a8.1 8.1 0 00-8.8-8.8l-11.3 1a22.7 22.7 0 00-3.4.6h-.1a22.8 22.8 0 00-10.4 6zm-23.9 24L28.4 41.8 65.6 36zm-22-10l4.6-4.6 16 16-4.6 4.5zm58.4 58.2l-16-16 4.5-4.5 16 16zm5.6-6.3L70.5 84 92 62.4zm16.3-90.8l11.3-1.1a6.1 6.1 0 016.7 6.7l-1.1 11.3-.2 1.3-18-18 1.3-.2zm-3.6.7l19.8 19.8a21 21 0 01-5.3 9L57.7 94 46.3 82.5 75 53.7a1 1 0 000-1.4 1 1 0 00-1.5 0L45 81.1 34 70.3l10.7-10.6 45-45a21 21 0 019-5.3zM10.9 120.4a3.3 3.3 0 001.4-.3l19.5-9.1A11.2 11.2 0 1017 96.2l-9.1 19.5a3.3 3.3 0 003 4.7zm-1.2-3.9l9-19.5a9.1 9.1 0 016.8-5.2 10.2 10.2 0 011.7-.1 9.2 9.2 0 019 10.8 9.1 9.1 0 01-5.2 6.7l-19.5 9a1.3 1.3 0 01-1.8-1.7z"/>
                    <path d="M96.2 42.3a10.5 10.5 0 10-7.4-3 10.4 10.4 0 007.4 3zm-6-16.5a8.5 8.5 0 110 12 8.4 8.4 0 010-12z"/>
                </svg>
                <br>${{ $plan2->price }}/mo
                <br>
                @if(request('upgrade') == true)
                    <a onclick="selectPlan({{ $plan2->id }}, {{ $plan2->price }})" class="btn btn-main"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }}</a>
                @elseif(count($free_trial_projects) == 0)
                    <a onclick="selectPlan({{ $plan2->id }}, {{ $plan2->price }})" class="btn btn-main">{{ __('saas.7 Days Free Trial') }}</a>
                @else
                    <a onclick="selectPlan({{ $plan2->id }}, {{ $plan2->price }})" class="btn btn-main">{{ __('saas.Subscribe') }}</a>
                @endif
            </td>
            <td class="price">
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 128 128">
                    <defs/>
                    <path d="M38.6 53.2a14.6 14.6 0 0010.6-24.6 1 1 0 00-.7-.3 1.1 1.1 0 00-.7.3l-8.9 8.9-1.7-1.7a1 1 0 00-1.4 1.4l1.7 1.7-9 8.9a1 1 0 000 1.4 14.5 14.5 0 0010.1 4zm9.9-22.4a12.6 12.6 0 01-17.7 17.7z"/>
                    <path d="M2.7 102.7a1 1 0 00.3.7L24.5 125a1 1 0 00.7.3 1 1 0 00.7-.3l12.4-12.3a.8.8 0 00.4-.5l12.1-12a1 1 0 00.3-.2.9.9 0 00.2-.3l12.3-12.3a1 1 0 000-1.4l-8.4-8.4 1.5-1.5 11.8 11.9 3.7 6.4.1.1a1 1 0 00.1.2l5.1 5.1a1 1 0 00.7.3 1 1 0 00.7-.3L99.7 79a1 1 0 000-1.4l-5-5.1a1 1 0 00-.2-.1h-.1l-6.5-3.8-11.8-11.9 1.4-1.4 8.4 8.3a1 1 0 00.7.3 1 1 0 00.7-.3L125 26a1 1 0 000-1.4L103.5 3a1 1 0 00-1.4 0L89.7 15.4a.8.8 0 00-.4.5L77.2 28a1 1 0 00-.3.2.9.9 0 00-.2.3L64.4 40.8a1 1 0 000 1.4l8.4 8.4-1.5 1.4-11.4-11.4a1 1 0 00-1.4 0l-18 17.9a1 1 0 000 1.4L52 71.3l-1.4 1.4-8.4-8.3a1 1 0 00-1.4 0L3 102a1 1 0 00-.3.7zM29 79l9.3 9.3L27 99.5l-9.4-9.3zm10.7 10.8l9.3 9.3-11.1 11.1-9.3-9.3zm38.7 7.8L74.6 94 94 74.6l3.7 3.7zm-4.9-5.3l-2.8-5 16.8-16.7 5 2.8zm-4-6.5L67 83.6 78.7 72a1 1 0 000-1.4 1 1 0 00-1.4 0L65.7 82.2 46.3 62.8l16.5-16.5 19.4 19.4-1.7 1.7a1 1 0 101.4 1.4l1.7-1.7 2.2 2.2zm20.8-68l9.3 9.3-11 11.1L79 29zm10.7 10.8l9.4 9.3L99.2 49l-9.4-9.3zm1.9-23.4l20 20-11.1 11.2-9.3-9.3 10-10a1 1 0 000-1.4 1 1 0 00-1.5 0l-10 10-9.3-9.3zM77.7 30.3l9.3 9.3-9.6 9.7a1 1 0 000 1.4 1 1 0 001.4 0l9.6-9.7 9.3 9.4-11 11.1-20.2-20zM74.2 52l2 2-1.5 1.4-2-2zm-15-9.2l2.2 2.2L45 61.4l-2.2-2.2zm-5.8 30l1.9 2-1.5 1.4-2-2zm-12-6.2l20 20-11 11.2-9.4-9.3 9.6-9.7a1 1 0 00-1.4-1.4L39.6 87l-9.3-9.3zm-25 25l9.2 9.4-10 10a1 1 0 000 1.4 1 1 0 001.5 0l10-10 9.3 9.3-11.2 11.2-20-20zM43.6 28.2a1 1 0 00-.3-1.4 11.9 11.9 0 00-16.5 16.5 1 1 0 00.9.5 1 1 0 00.5-.2 1 1 0 00.3-1.4 9.9 9.9 0 0113.7-13.7 1 1 0 001.4-.3z"/>
                    <path d="M38.6 32.3a1 1 0 10.9-1.8 6.7 6.7 0 00-9 9 1 1 0 00.9.5 1 1 0 00.9-1.4 4.7 4.7 0 016.3-6.3z"/>
                </svg>
                <br>${{ $plan3->price }}/mo
                <br>
                @if(request('upgrade') == true)
                    <a onclick="selectPlan({{ $plan3->id }}, {{ $plan3->price }})" class="btn btn-main"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }}</a>
                @elseif(count($free_trial_projects) == 0)
                    <a onclick="selectPlan({{ $plan3->id }}, {{ $plan3->price }})" class="btn btn-main">{{ __('saas.7 Days Free Trial') }}</a>
                @else
                    <a onclick="selectPlan({{ $plan3->id }}, {{ $plan3->price }})" class="btn btn-main">{{ __('saas.Subscribe') }}</a>
                @endif
            </td>
        </tr>
        <tr>
            <td><a href="#wordpress-core-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> {{ __('saas.Free trial') }}</td>
            <td><i class="fa fa-check text-success"></i></td>
            <td><i class="fa fa-check text-success"></i></td>
            <td><i class="fa fa-check text-success"></i></td>
        </tr>
        <tr>
            <td><a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> {{ __('saas.Projects') }}</td>
            <td>1</td>
            <td>3</td>
            <td>6</td>
        </tr>
        <tr>
            <td><a href="#wordpress-security-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> {{ __('saas.24/24 Support') }}</td>
            <td><i class="fas fa-check text-success"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
        </tr>
        <tr>
            <td><a href="#wordpress-uptime-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a>
                {{ __('saas.Employees') }}</td>
            <td>2</td>
            <td>10</td>
            <td>30</td>
        </tr>
        <tr>
            <td><a href="#wordpress-malware-cleanup" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Weekly Reports</td>
            <td><i class="fas fa-times text-danger"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
        </tr>
        <tr>
            <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Security Audit</td>
            <td><i class="fas fa-times text-danger"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
        </tr>
        <tr>
            <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> On-Demand Audit</td>
            <td><i class="fas fa-times text-danger"></i></td>
            <td><i class="fas fa-times text-danger"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
        </tr>
        <tr>
            <td><a href="#wordpress-priority-support" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Priority Support</td>
            <td><i class="fas fa-times text-danger"></i></td>
            <td><i class="fas fa-times text-danger"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
        </tr>
        <tr>
            <td><a href="#wordpress-billing" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Easy Billing + No Contracts</td>
            <td><i class="fas fa-check text-success"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
            <td><i class="fas fa-check text-success"></i></td>
        </tr>
        <tr>
            <td></td>
            <td class="price">
                @if(request('upgrade') == true)
                    <a onclick="selectPlan({{ $plan1->id }}, {{ $plan1->price }})" class="btn btn-main"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }}</a>
                @elseif(count($free_trial_projects) == 0)
                    <a onclick="selectPlan({{ $plan1->id }}, {{ $plan1->price }})" class="btn btn-main">{{ __('saas.7 Days Free Trial') }}</a>
                @else
                    <a onclick="selectPlan({{ $plan1->id }}, {{ $plan1->price }})" class="btn btn-main">{{ __('saas.Subscribe') }}</a>
                @endif
            </td>
            <td class="price">
                @if(request('upgrade') == true)
                    <a onclick="selectPlan({{ $plan2->id }}, {{ $plan2->price }})" class="btn btn-main"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }}</a>
                @elseif(count($free_trial_projects) == 0)
                    <a onclick="selectPlan({{ $plan2->id }}, {{ $plan2->price }})" class="btn btn-main">{{ __('saas.7 Days Free Trial') }}</a>
                @else
                    <a onclick="selectPlan({{ $plan2->id }}, {{ $plan2->price }})" class="btn btn-main">{{ __('saas.Subscribe') }}</a>
                @endif
            </td>
            <td class="price">
                @if(request('upgrade') == true)
                    <a onclick="selectPlan({{ $plan3->id }}, {{ $plan3->price }})" class="btn btn-main"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }}</a>
                @elseif(count($free_trial_projects) == 0)
                    <a onclick="selectPlan({{ $plan3->id }}, {{ $plan3->price }})" class="btn btn-main">{{ __('saas.7 Days Free Trial') }}</a>
                @else
                    <a onclick="selectPlan({{ $plan3->id }}, {{ $plan3->price }})" class="btn btn-main">{{ __('saas.Subscribe') }}</a>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div id="secondStep">
    <form id="secondForm" method="GET" action="{{ route('mollie.payment') }}">
        <div class="row justify-content-center">
            @if(count($free_trial_projects) == 0)
                <div class="col-md-8">
                    <div class="alert alert-info">{{ __('saas.Which payment method will you use after your trial?') }}</div>
                </div>
            @endif
            <input type="hidden" name="plan" id="plan">
            <input type="hidden" name="upgrade" value="{{ request('upgrade') }}">
            <input type="hidden" name="coupon" id="coupon" value="{{ request('coupon') }}">
            <div class="col-md-8">
                <div class="col-md-12 card">
                    <div class="card-body">
                        <label class="w-100 custom-control custom-radio custom-control-inline">
                            <p class="text-dark font-weight-bold font-20">{{ __('saas.Credit card') }}</p>
                            <input required value="Credit card" type="radio" name="method" class="custom-control-input"><span class="custom-control-label"></span>
                            <img class="img-fluid ml-3" style="height: 50px" src="https://petemergencyeducation.com/wp-content/uploads/2018/08/credit-card-logos.jpg" loading=lazy>
                        </label>
                    </div>
                </div>
                <div class="col-md-12 card">
                    <div class="card-body">
                        <label class="w-100 custom-control custom-radio custom-control-inline">
                            <p class="text-dark font-weight-bold font-20">{{ __('saas.Paypal') }}</p>
                            <input required value="PayPal" type="radio" name="method" class="custom-control-input"><span class="custom-control-label"></span>
                            <img class="img-fluid ml-3" style="height: 90px" src="https://www.giacomo-design.com/wp-content/uploads//2017/03/paypal-1.png" loading=lazy>
                        </label>
                    </div>
                </div>
                <div class="col-md-12 card">
                    <div class="card-body">
                        <label class="w-100 custom-control custom-radio custom-control-inline">
                            <p class="text-dark font-weight-bold font-20">{{ __('saas.Bank transfer') }}</p>
                            <input disabled required value="Bank transfer" type="radio" name="method" class="custom-control-input"><span class="custom-control-label"></span>
                            <img class="img-fluid ml-3" style="height: 120px" src="{{ url('/images/bank_tranfer.png') }}" loading=lazy>
                        </label>
                        <p>{{ __('saas.To go with this payment method, please contact us per phone or email') }}</p>
                        <i class="fa fa-phone"></i> {{ env('PHONE') }} | <i class="fa fa-envelope"></i> {{ env('EMAIL') }}
                    </div>
                </div>
                <div class="d-block mx-auto">
                    <button onclick="reverse()" class="btn btn-secondary" style="border-radius: 12px">{{ __('general.Cancel') }}</button>
                    <button type="submit" class="btn btn-main text-light">{{ __('saas.Continue to Pay') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
