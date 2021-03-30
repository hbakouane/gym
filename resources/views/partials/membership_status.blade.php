@if($member->ended_at < \Carbon\Carbon::today())
    <span class="badge badge-danger">{{ __('membership.Membership not paid') }}</span>
@else
    <span class="badge badge-success">{{ __('membership.Membership paid') }}</span>
@endif
