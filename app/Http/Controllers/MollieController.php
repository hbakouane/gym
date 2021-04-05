<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Project;
use App\Models\Saas\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{
    public function  __construct() {
        Mollie::api()->setApiKey('test_hqaBJBAWthMVBCfQc4TRkhcRTfMEjH');
    }

    public function preparePayment()
    {
        // Check if the user wants a free trial
        $free_trial_projects = \App\Models\Project::where('user_id', auth()->id())->where('trial', true)->get();
        if (count($free_trial_projects) == 0) {
            $projectsToFreeTrial = Project::where('user_id', auth()->id())->get();
            foreach ($projectsToFreeTrial as $projectToFreeTrial) {
                $projectToFreeTrial->update([
                    'started_at' => now()->toDateString(),
                    'ended_at' => now()->addDays(7)->toDateString(), // Give a 7 days free trial
                ]);
            }
            $project = Project::where('user_id', auth()->id())->first();
            return redirect(route('home', $project->project));
        }

        // Get the plan
        $plan = Plan::where('id', request('plan'))->first();
        $order_id = Str::random(16);
        $user = auth()->user();
        // Create a subscription with 'Pending' status
        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'subscription_id' => $order_id,
            'status' => 'unpaid',
            'payment_method' => request('method')
        ])->save();

        if ($plan->duration == 31 OR $plan->duration == 30) {
            $plan->duration = 'month';
        } elseif ($plan->duration == 365 OR $plan->duration == 366) {
            $plan->duration = 'year';
        } else {
            $plan->duration = $plan->duration . ' days';
        }

        // Check if there is a coupon code
        if (request('coupon')) {
            $coupon = request('coupon');
            $coupon = \App\Models\Coupon::where('name', $coupon)->first();
            // Apply the coupon code if exists
            $couponed = number_format($plan->price - ($plan->price * $coupon->percentage * 1 / 100), 2, '.');
        }

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "USD",
                "value" => $couponed ?? $plan->price // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "$plan->Name | $$plan->price | per $plan->duration",
            "redirectUrl" => URL::temporarySignedRoute('order.success', now()->addMinutes(1), ['order_id' => $order_id]),
            "metadata" => [
                "order_id" => $order_id,
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * After the customer has completed the transaction,
     * you can fetch, check and process the payment.
     * This logic typically goes into the controller handling the inbound webhook request.
     * See the webhook docs in /docs and on mollie.com for more information.
     */
    public function paymentSuccess()
    {
        // Get this subscription
        $subscription = Subscription::where('subscription_id', request('order_id'))->orderBy('id', 'DESC')->first();
        $subscription->update(['status' => 'paid']);

        // Activate the projects
        $projects = Project::where('user_id', auth()->id())->get();
        foreach ($projects as $project) {
            $project->update([
                'started_at' => now()->toDateString(),
                'ended_at' => now()->addDays($subscription->plan->duration)->toDateString(),
                'subscribed' => true
            ]);
        }
        print __('saas.Your payment have been made successfully.') . ' . . .';
        return redirect(route('home', Project::where('user_id', auth()->id())->first()->project));
    }
}
