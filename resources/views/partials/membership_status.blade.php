@if(! $member->ended_at)
    <span class="badge badge-warning">{{ __('membership.Not subscribed yet') }}</span>
@elseif($member->ended_at < \Carbon\Carbon::today())
    <span class="badge badge-danger">{{ __('membership.Membership not paid') }}</span>
@else
    <span class="badge badge-success">{{ __('membership.Membership paid') }}</span>
@endif
