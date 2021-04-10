@if($currentProject->ended_at > now()->toDateString() AND $currentProject->trial == false)
    <div class="alert alert-info text-center">
        <p class="text-info">You're on free trial, <span>{{ \Carbon\Carbon::now()->diffIndays($currentProject->ended_at) }} {{ __('saas.days left') }}.</span>
        <a class="btn btn-sm btn-info shadow rounded-pill" href="{{ route('plans.show', ['project' => $currentProject->project, 'upgrade' => true]) }}"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }} </a>
    </div>
@endif