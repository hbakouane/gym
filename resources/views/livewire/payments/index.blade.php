<div>
    @include('partials.toastr')
    <div class="card">
        <h5 class="card-header">
            {{ __('payments.Payments') }} <a href="{{ route('payments.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first datatableTable">
                    <thead>
                    <tr>
                        <th>{{ __('general.User') }}</th>
                        <th>{{ __('general.Type') }}</th>
                        <th>{{ __('navbar.Membership') . ' ' . __('membership.ID') }}</th>
                        <th>{{ __('payments.Amount') }}</th>
                        <th>{{ __('payments.Payment type') }}</th>
                        <th>{{ __('payments.Payment date') }}</th>
                        <th>{{ __('payments.Note') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>
                                <a target="_blank" href="{{ route(str_contains($payment->payable_type, 'Member') ? 'members.show' : 'vendors.show', [$prefix, $payment->payable_id]) }}">
                                    <img class="img-fluid user-avatar-md rounded-circle" src="{{ makeProfileImg($payment->payable->photo, true) }}">
                                    {{ $payment->payable->name }}
                                </a>
                            </td>
                            <td>
                                <div class="badge badge-{{ $payment->payable_type == "App\Models\Member" ? 'success' : 'brand' }}">
                                    {{ $payment->payable_type == "App\Models\Member" ? __('members.Member') : __('vendors.Vendor') }}
                                </div>
                            </td>
                            <td>
                                @if($payment->membership_id)
                                    <i class="fa fa-circle text-success"></i> {{ '#' . $payment->membership_id ?? '' }}
                                @endif
                            </td>
                            <td>{{ ($website->currency ?? '') . $payment->amount }}</td>
                            <td>{{ $payment->payment_type }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->note }}</td>
                            <td title="{{ $payment->created_at->diffForHumans() }}">
                                {{ $payment->created_at }}
                                @if($payment->created_at != $payment->updated_at)
                                    <div class="badge badge-brand" title="{{ __('general.Updated at') . ' ' . $payment->updated_at . ' (' . $payment->updated_at->diffForHumans() . ')' }}">{{ __('general.Updated') }}</div>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">
                                    <a href="{{ route('payments.edit', [$prefix, $payment->id]) }}" class="btn btn-brand btn-sm"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $payment->id }}, '{{ $payment->payable_type }}')"><i class="fa fa-trash-alt"></i> {{ __('general.Delete') }}</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ __('general.User') }}</th>
                        <th>{{ __('general.Type') }}</th>
                        <th>{{ __('navbar.Membership') . ' ' . __('membership.ID') }}</th>
                        <th>{{ __('payments.Amount') }}</th>
                        <th>{{ __('payments.Payment type') }}</th>
                        <th>{{ __('payments.Payment date') }}</th>
                        <th>{{ __('payments.Note') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
