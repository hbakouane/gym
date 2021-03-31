<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $prefix;
    public $members;
    public $paidMemberships;
    public $revenue;
    public $expenses;

    public $project_id;

    public $oneWeekBefore;

    public function __construct()
    {
        $this->oneWeekBefore = [$this->getDay(6), $this->getDay(5), $this->getDay(4), $this->getDay(3), $this->getDay(2), $this->getDay(1), Carbon::today()->toDateString() . ' (' . lcfirst(__('home.Today')) . ')'];
    }

    public function render()
    {
        // Prepate the Chart
        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($this->oneWeekBefore)
            ->datasets([
                [
                    "label" => __('membership.Members'),
                    'backgroundColor' => "#AC84DE",
                    'borderColor' => "#A4ACF7",
                    "pointBorderColor" => "#4852F9",
                    "pointBackgroundColor" => "#4852F9",
                    "pointHoverBackgroundColor" => "#6b72ed",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getMembers(6), $this->getMembers(5), $this->getMembers(4), $this->getMembers(3), $this->getMembers(2), $this->getMembers(1), $this->getMembers()],
                ],
                [
                    "label" => __('membership.Paid Memberships'),
                    'backgroundColor' => "#FF9FBD",
                    'borderColor' => "#FF588D",
                    "pointBorderColor" => "#963755",
                    "pointBackgroundColor" => "#963755",
                    "pointHoverBackgroundColor" => "#bf5677",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$this->getRevenue(6), $this->getRevenue(5), $this->getRevenue(4), $this->getRevenue(3), $this->getRevenue(2), $this->getRevenue(1), $this->getRevenue()],
                ]
            ])
            ->options([]);
        return view('livewire.dashboard', ['chartjs' => $chartjs]);
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

    public function getDay($toSub = 0)
    {
        return now()->subDays($toSub)->toDateString();
    }
}
