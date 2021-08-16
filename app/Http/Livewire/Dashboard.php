<?php

namespace App\Http\Livewire;

use App\Models\Credit;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Staff;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $date_pick;
    public $from;
    public $to;

    public $prefix;
    public $members;
    public $paidMemberships;
    public $revenue;
    public $expenses;
    public $staves;
    public $vendors;
    public $creditsToMembers;
    public $creditsFromVendors;

    public $project_id;

    public $oneWeekBefore;

    public $filter = false;

    public $filtredBefore = false;

    public function __construct()
    {
        $this->oneWeekBefore = [$this->getDay(6), $this->getDay(5), $this->getDay(4), $this->getDay(3), $this->getDay(2), $this->getDay(1), Carbon::today()->toDateString() . ' (' . lcfirst(__('home.Today')) . ')'];
        $this->date_pick = Carbon::today()->toDateString();
        $this->filtredBefore = false;
    }

    public function render()
    {
        $charts = $this->renderCharts();
        return view('livewire.dashboard', [
            'chartjs' => $charts[0],
            'revenueChart' => $charts[1],
            'stavesVendorsChart' => $charts[2],
            'creditsChart' => $charts[3]
        ]);
    }

    public function mount()
    {
        $this->project_id = Project::getProjectId($this->prefix);
        $this->members = count(Member::where('project_id', $this->project_id)->get());
        $this->paidMemberships = count(Membership::where('project_id', $this->project_id)->get());

        // Count the revenue
        $this->revenue = DB::table('payments')
                                ->where('project_id', $this->project_id)
                                ->where('payable_type', 'App\Models\Member')
                                ->sum('amount');

        // Count the expenses
        $expenses = DB::table('expenses')
                        ->where('project_id', $this->project_id)
                        ->sum('amount');
        $payments_to_vendors = DB::table('payments')
                                ->where('project_id', $this->project_id)
                                ->where('payable_type', 'App\Models\Vendor')
                                ->sum('amount');
        $this->expenses = $expenses + $payments_to_vendors;

        $this->staves = count(Staff::where('project_id', $this->project_id)->get());
        $this->vendors = count(Vendor::where('project_id', $this->project_id)->get());
        $this->creditsToMembers = DB::table('credits')
                                    ->where('project_id', $this->project_id)
                                    ->where('status', 'Unpaid')
                                    ->where('creditable_type', 'App\Models\Member')
                                    ->sum('amount');
        $this->creditsFromVendors = DB::table('credits')
                                        ->where('project_id', $this->project_id)
                                    ->where('status', 'Unpaid')
                                        ->where('creditable_type', 'App\Models\Vendor')
                                        ->sum('amount');
    }

    public function getMembers($duration = 0)
    {
        $project_id = Project::getProjectId($this->prefix);
        if (is_array($duration)) {
            return count(Member::where('project_id', $project_id)->whereBetween('created_at', $duration)->get());
        }
        return count(Member::where('project_id', $project_id)->whereDate('created_at', '=', now()->subDays($duration)->toDateString())->get());
    }

    public function getRevenue($duration = 0)
    {
        $project_id = Project::getProjectId($this->prefix);
        if (is_array($duration)) {
            return DB::table('payments')
                ->where('project_id', $project_id)
                ->where('payable_type', 'App\Models\Member')
                ->whereBetween('created_at', $duration)
                ->sum('amount');
        }
        return DB::table('payments')
            ->where('project_id', $project_id)
            ->where('payable_type', 'App\Models\Member')
            ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
            ->sum('amount');
    }

    public function getPaidMemberships($duration = 0)
    {
        $project_id = Project::getProjectId($this->prefix);
        if (is_array($duration)) {
            $memberships = DB::table('memberships')
                ->where('project_id', $project_id)
                ->whereBetween('created_at', $duration)
                ->get();
            return count($memberships);
        }
        $memberships = DB::table('memberships')
            ->where('project_id', $project_id)
            ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
            ->get();
        return count($memberships);
    }

    public function getExpenses($duration = 0)
    {
        $project_id = Project::getProjectId($this->prefix);
        if (is_array($duration)) {
            $expenses = DB::table('expenses')
                ->where('project_id', $this->project_id)
                ->whereBetween('created_at', $duration)
                ->sum('amount');
            $payments_to_vendors = DB::table('payments')
                ->where('project_id', $this->project_id)
                ->where('payable_type', 'App\Models\Vendor')
                ->whereBetween('created_at', $duration)
                ->sum('amount');
            return $expenses + $payments_to_vendors;
        }
        $expenses = DB::table('expenses')
            ->where('project_id', $this->project_id)
            ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
            ->sum('amount');
        $payments_to_vendors = DB::table('payments')
            ->where('project_id', $this->project_id)
            ->where('payable_type', 'App\Models\Vendor')
            ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
            ->sum('amount');
        return $expenses + $payments_to_vendors;
    }

    public function getStaves($duration = 0)
    {
        if (is_array($duration)) {
            return count(
                DB::table('staff')
                    ->where('project_id', $this->project_id)
                    ->whereBetween('created_at', $duration)
                    ->get()
            );
        }
        return count(
                DB::table('staff')
                    ->where('project_id', $this->project_id)
                    ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
                    ->get()
        );
    }

    public function getVendors($duration = 0)
    {
        if (is_array($duration)) {
            $vendors = DB::table('vendors')
                        ->where('project_id', $this->project_id)
                        ->whereBetween('created_at', $duration)
                        ->get();
            return count($vendors);
        }
        $vendors = DB::table('vendors')
                    ->where('project_id', $this->project_id)
                    ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
                    ->get();
        return count($vendors);
    }

    public function getCreditsToMembers($duration = 0)
    {
        if (is_array($duration)) {
            return DB::table('credits')
                    ->where('project_id', $this->project_id)
                ->where('status', 'Unpaid')
                    ->whereBetween('created_at', $duration)
                    ->where('creditable_type', 'App\Models\Member')
                    ->sum('amount');
        }
        return DB::table('credits')
            ->where('project_id', $this->project_id)
            ->where('status', 'Unpaid')
            ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
            ->where('creditable_type', 'App\Models\Member')
            ->sum('amount');
    }

    public function getCreditsFromVendors($duration = 0)
    {
        if (is_array($duration)) {
            return DB::table('credits')
                ->where('project_id', $this->project_id)
                ->where('status', 'Unpaid')
                ->whereBetween('created_at', $duration)
                ->where('creditable_type', 'App\Models\Vendor')
                ->sum('amount');
        }
        return DB::table('credits')
            ->where('project_id', $this->project_id)
            ->where('status', 'Unpaid')
            ->whereDate('created_at', '=', now()->subDays($duration)->toDateString())
            ->where('creditable_type', 'App\Models\Vendor')
            ->sum('amount');
    }

    public function getDay($toSub = 0)
    {
        return now()->subDays($toSub)->toDateString();
    }

    public function redefine($date)
    {
        $daysToDiff = \Carbon\Carbon::today()->diffInDays($this->date_pick);
        if (is_array($date)) {
            $daysToDiff = $date;
        }
        $this->revenue = $this->getRevenue($daysToDiff);
        $this->expenses = $this->getExpenses($daysToDiff);
        $this->paidMemberships = $this->getPaidMemberships($daysToDiff);
        $this->members = $this->getMembers($daysToDiff);
        $this->staves = $this->getStaves($daysToDiff);
        $this->vendors = $this->getVendors($daysToDiff);
        $this->creditsToMembers = $this->getCreditsToMembers($daysToDiff);
        $this->creditsFromVendors = $this->getCreditsFromVendors($daysToDiff);
    }

    public function renderCharts()
    {
        $website = Project::where('project', $this->prefix)->first();
        // Prepare the Charts
        $chartjs = app()->chartjs
            ->name('summary')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($this->oneWeekBefore)
            ->datasets([
                [
                    "label" => __('membership.Paid Memberships'),
                    'backgroundColor' => "#ff9fbd7d",
                    'borderColor' => "#FF588D",
                    "pointBorderColor" => "#963755",
                    "pointBackgroundColor" => "#963755",
                    "pointHoverBackgroundColor" => "#bf5677",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getPaidMemberships(6), $this->getPaidMemberships(5), $this->getPaidMemberships(4), $this->getPaidMemberships(3), $this->getPaidMemberships(2), $this->getPaidMemberships(1), $this->getPaidMemberships()],
                ],
                [
                    "label" => __('membership.Members'),
                    'backgroundColor' => "#ac84de85",
                    'borderColor' => "#A4ACF7",
                    "pointBorderColor" => "#4852F9",
                    "pointBackgroundColor" => "#4852F9",
                    "pointHoverBackgroundColor" => "#6b72ed",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getMembers(6), $this->getMembers(5), $this->getMembers(4), $this->getMembers(3), $this->getMembers(2), $this->getMembers(1), $this->getMembers()],
                ]
            ])
            ->options([]);

        $revenueChart = app()->chartjs
            ->name('revenues')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($this->oneWeekBefore)
            ->datasets([
                [
                    "label" => __('home.Revenue'),
                    'backgroundColor' => "#2ec5515c",
                    'borderColor' => "#C5FAD4",
                    "pointBorderColor" => "#C5FAD9",
                    "pointBackgroundColor" => "#8a4c5f",
                    "pointHoverBackgroundColor" => "#bf5677",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getRevenue(6), $this->getRevenue(5), $this->getRevenue(4), $this->getRevenue(3), $this->getRevenue(2), $this->getRevenue(1), $this->getRevenue()],
                ],
                [
                    "label" => __('home.Expenses'),
                    'backgroundColor' => "#25d5f54a",
                    'borderColor' => "#25d5f24b",
                    "pointBorderColor" => "#25d5f24c",
                    "pointBackgroundColor" => "#8a4c5f",
                    "pointHoverBackgroundColor" => "#bf5677",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getExpenses(6), $this->getExpenses(5), $this->getExpenses(4), $this->getExpenses(3), $this->getExpenses(2), $this->getExpenses(1), $this->getExpenses()],
                ],
            ])
            ->options([]);

        $stavesVendorsChart = app()->chartjs
            ->name('stavesVendorsChart')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($this->oneWeekBefore)
            ->datasets([
                [
                    "label" => __('home.Staves'),
                    'backgroundColor' => "#ff9fbd7d",
                    'borderColor' => "#FF588D",
                    "pointBorderColor" => "#963755",
                    "pointBackgroundColor" => "#963755",
                    "pointHoverBackgroundColor" => "#bf5677",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getStaves(6), $this->getStaves(5), $this->getStaves(4), $this->getStaves(3), $this->getStaves(2), $this->getStaves(1), $this->getStaves()],
                ],
                [
                    "label" => __('home.Vendors'),
                    'backgroundColor' => "#ac84de85",
                    'borderColor' => "#A4ACF7",
                    "pointBorderColor" => "#4852F9",
                    "pointBackgroundColor" => "#4852F9",
                    "pointHoverBackgroundColor" => "#6b72ed",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getVendors(6), $this->getVendors(5), $this->getVendors(4), $this->getVendors(3), $this->getVendors(2), $this->getVendors(1), $this->getVendors()],
                ],
            ])
            ->options([]);

        $credits = app()->chartjs
            ->name('credits')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($this->oneWeekBefore)
            ->datasets([
                [
                    "label" => __('home.Credits (members)'),
                    'backgroundColor' => "#2ec5515c",
                    'borderColor' => "#C5FAD4",
                    "pointBorderColor" => "#C5FAD9",
                    "pointBackgroundColor" => "#8a4c5f",
                    "pointHoverBackgroundColor" => "#bf5677",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getCreditsToMembers(6), $this->getCreditsToMembers(5), $this->getCreditsToMembers(4), $this->getCreditsToMembers(3), $this->getCreditsToMembers(2), $this->getCreditsToMembers(1), $this->getCreditsToMembers()],
                ],
                [
                    "label" => __('home.Credits (vendors)'),
                    'backgroundColor' => "#25d5f54a",
                    'borderColor' => "#25d5f54a",
                    "pointBorderColor" => "#25d5f24b",
                    "pointBackgroundColor" => "#25d5f24c",
                    "pointHoverBackgroundColor" => "#8a4c5f",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getCreditsFromVendors(6), $this->getCreditsFromVendors(5), $this->getCreditsFromVendors(4), $this->getCreditsFromVendors(3), $this->getCreditsFromVendors(2), $this->getCreditsFromVendors(1), $this->getCreditsFromVendors()],
                ],
            ])
            ->options([]);
        return [$chartjs, $revenueChart, $stavesVendorsChart, $credits];
    }

    public function toggleFilter()
    {
        $this->filtredBefore = true;
        $this->filter = ! $this->filter;
    }
}
