<?php

namespace App\Console\Commands;

use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Website;
use Illuminate\Console\Command;

class EnterData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enter:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enters the plans data to the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $website = Website::first();
        if (! $website) {
            Website::create(['name' => 'Avocardio', 'sentence' => 'Avocardio', 'description' => 'Avocardio', 'keywords' => 'avocardio, gym crm, crm', 'free_trial_days' => 7]);
        }
        // Create the plans
        $plan1 = Plan::create(['name' => 'Started', 'isPublic' => 1, 'duration' => 31, 'price' => 39.90]);
        $plan2 = Plan::create(['name' => 'Popular', 'isPublic' => 1, 'duration' => 31, 'price' => 59.90]);
        $plan3 = Plan::create(['name' => 'Pro', 'isPublic' => 1, 'duration' => 31, 'price' => 109.90]);

        // Create the plan features and their limitations to each plan
        // project.create feature
        PlanFeature::create(['name' => 'project.create', 'number' => 1, 'plan_id' => $plan1->id]);
        PlanFeature::create(['name' => 'project.create', 'number' => 3, 'plan_id' => $plan2->id]);
        PlanFeature::create(['name' => 'project.create', 'number' => 5, 'plan_id' => $plan3->id]);

        // members.create feature
        PlanFeature::create(['name' => 'members.create', 'number' => 150, 'plan_id' => $plan1->id]);
        PlanFeature::create(['name' => 'members.create', 'number' => 500, 'plan_id' => $plan2->id]);

        // vendors.create feature
        PlanFeature::create(['name' => 'vendors.create', 'number' => 20, 'plan_id' => $plan1->id]);
        PlanFeature::create(['name' => 'vendors.create', 'number' => 50, 'plan_id' => $plan2->id]);
        PlanFeature::create(['name' => 'vendors.create', 'number' => 100, 'plan_id' => $plan3->id]);

        // staves.create feature
        PlanFeature::create(['name' => 'staves.create', 'number' => 5, 'plan_id' => $plan1->id]);
        PlanFeature::create(['name' => 'staves.create', 'number' => 15, 'plan_id' => $plan2->id]);
        PlanFeature::create(['name' => 'staves.create', 'number' => 30, 'plan_id' => $plan3->id]);

        // memberships.create feature
        PlanFeature::create(['name' => 'memberships.create', 'number' => 150, 'plan_id' => $plan1->id]);
        PlanFeature::create(['name' => 'memberships.create', 'number' => 500, 'plan_id' => $plan2->id]);
        PlanFeature::create(['name' => 'memberships.create', 'number' => 650, 'plan_id' => $plan3->id]);

        // payments.create feature
        PlanFeature::create(['name' => 'payments.create', 'number' => 1000, 'plan_id' => $plan1->id]);
        PlanFeature::create(['name' => 'payments.create', 'number' => 1000, 'plan_id' => $plan2->id]);
        PlanFeature::create(['name' => 'payments.create', 'number' => 1000, 'plan_id' => $plan3->id]);

        $this->info('Data created successfully!');
    }
}
