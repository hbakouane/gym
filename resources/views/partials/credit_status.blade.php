@if($credit->status === 'Paid')
    <div class="badge badge-success">{{ __('credits.Paid') }}</div>
@elseif($credit->status === 'Unpaid')
    <div class="badge badge-warning">{{ __('credits.Unpaid') }}</div>
@else
    <div class="badge badge-secondary">{{ $credit->status }}</div>
@endif
