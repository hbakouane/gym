@if($member->ended_at < \Carbon\Carbon::today())
    <i class="fa fa-circle small text-danger" title="{{ __('membership.Membership not paid') }}"></i>
@else
    <i class="fa fa-circle small text-success" title="{{ __('membership.Membership paid') }}"></i>
@endif
