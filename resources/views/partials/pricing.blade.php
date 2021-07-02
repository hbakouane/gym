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
    $plan1 = \App\Models\Plan::first();
    $plan2 = \App\Models\Plan::where('price', '>', $plan1->price)->first();
    $plan3 = \App\Models\Plan::where('price', '>', $plan2->price)->first();

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
    <p class="h1 text-center text-dark font-weight-bold pb-3">{{ __('saas.Our plans start from') . " RM59.90" }}</p>
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
                    // and remove any existing hash string
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
            <td class="price-table-popular">Most popular</td>
            
        </tr>
        <tr class="price-table-head">
            <td>
            </td>
            
            <td>
                Standard
                <br><small style="font-size: 12px; font-weight: 400;">Longer data retention</small>
            </td>
            
        </tr>
        <tr>
            <td>
                <p class="text-dark font-weight-bold mb-0">Do you have a coupon code?</p>
                <form method="GET" action="">
                    <input type="hidden" name="project" value="4IoDoeNQkg">
                    <input class="form-control input w-100" name="coupon" placeholder="Coupon code">
                    <button class="btn btn-outline-secondary rounded-pill btn-sm mt-2">Submit</button>
                </form>
            </td>
            
            <td class="price">
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 128 128">
                    <defs></defs>
                    <path d="M62.6 103.3a1 1 0 00-1.4 0L44 120.8a1 1 0 000 1.4 1 1 0 00.7.3 1 1 0 00.7-.3l17.3-17.3a1 1 0 000-1.5zM58.7 116.3a1 1 0 00.7-.3l7.2-7.2a1 1 0 00-1.4-1.5l-7.2 7.3a1 1 0 00.7 1.7zM55.2 117.4l-2.8 2.8a1 1 0 00.7 1.7 1 1 0 00.7-.3l2.8-2.8a1 1 0 000-1.4 1 1 0 00-1.4 0zM5.9 84.1a1 1 0 00.7.3 1 1 0 00.7-.3l17.4-17.3a1 1 0 10-1.5-1.4L6 82.7a1 1 0 000 1.4zM13.4 70l7.3-7.2a1 1 0 10-1.5-1.4L12 68.6a1 1 0 00.7 1.7 1 1 0 00.7-.3zM7.8 75.6l2.8-2.8a1 1 0 000-1.4 1 1 0 00-1.4 0l-2.8 2.8a1 1 0 000 1.4 1 1 0 00.7.3 1 1 0 00.7-.3zM68 33.6L27.1 40a1 1 0 00-.5.3L20 46.8a1 1 0 000 1.5l16.6 16.6-4.7 4.7a1 1 0 000 1.5l11.5 11.4-4.6 4.6a1 1 0 00.7 1.7 1 1 0 00.7-.3l4.6-4.6L57 96a1 1 0 001.4 0l4.7-4.7 16.7 16.6a1 1 0 001.4 0l6-6 .5-.5a1 1 0 00.3-.6L94.4 60l20.3-20.3a22.8 22.8 0 006-10.3.6.6 0 000-.2 22 22 0 00.5-3.4l1.1-11.3a8.1 8.1 0 00-8.8-8.8l-11.3 1a22.7 22.7 0 00-3.4.6h-.1a22.8 22.8 0 00-10.4 6zm-23.9 24L28.4 41.8 65.6 36zm-22-10l4.6-4.6 16 16-4.6 4.5zm58.4 58.2l-16-16 4.5-4.5 16 16zm5.6-6.3L70.5 84 92 62.4zm16.3-90.8l11.3-1.1a6.1 6.1 0 016.7 6.7l-1.1 11.3-.2 1.3-18-18 1.3-.2zm-3.6.7l19.8 19.8a21 21 0 01-5.3 9L57.7 94 46.3 82.5 75 53.7a1 1 0 000-1.4 1 1 0 00-1.5 0L45 81.1 34 70.3l10.7-10.6 45-45a21 21 0 019-5.3zM10.9 120.4a3.3 3.3 0 001.4-.3l19.5-9.1A11.2 11.2 0 1017 96.2l-9.1 19.5a3.3 3.3 0 003 4.7zm-1.2-3.9l9-19.5a9.1 9.1 0 016.8-5.2 10.2 10.2 0 011.7-.1 9.2 9.2 0 019 10.8 9.1 9.1 0 01-5.2 6.7l-19.5 9a1.3 1.3 0 01-1.8-1.7z"></path>
                    <path d="M96.2 42.3a10.5 10.5 0 10-7.4-3 10.4 10.4 0 007.4 3zm-6-16.5a8.5 8.5 0 110 12 8.4 8.4 0 010-12z"></path>
                </svg>
                <br>RM59.90/mo
                <br>
                                    <a onclick="selectPlan(2, 59.90)" class="btn btn-main">7 Days Free Trial</a>
                            </td>
            
        </tr>
        <tr>
            <td></td>
            
            <td><i class="fa fa-check text-success"></i></td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Projects</td>
            
            <td>3</td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-security-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> 24/24h Support</td>
            
            <td><i class="fas fa-check text-success"></i></td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-uptime-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a>
                Employees</td>
            
            <td>10</td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-malware-cleanup" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Weekly Reports</td>
            
            <td><i class="fas fa-check text-success"></i></td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Security Audit</td>
            
            <td><i class="fas fa-check text-success"></i></td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> On-Demand Audit</td>
            
            <td><i class="fas fa-times text-danger"></i></td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-priority-support" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Priority Support</td>
            
            <td><i class="fas fa-times text-danger"></i></td>
            
        </tr>
        <tr>
            <td><a href="#wordpress-billing" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Easy Billing + No Contracts</td>
            
            <td><i class="fas fa-check text-success"></i></td>
            
        </tr>
        <tr>
            <td></td>
            
            <td class="price">
                                    <a onclick="selectPlan(2, 59.90)" class="btn btn-main">7 Days Free Trial</a>
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
