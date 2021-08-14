<div>
    @include('partials.toastr')
    <div class="card">
        <h5 class="card-header">
            {{ __('pages.Credits') }} <a href="{{ route('credits.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first" id="datatable">
                    <thead>
                    <tr>
                        <th>{{ __('general.User') }}</th>
                        <th>{{ __('general.Type') }}</th>
                        <th>{{ __('payments.Amount') }}</th>
                        <th>{{ __('payments.Payment type') }}</th>
                        <th>{{ __('payments.Payment date') }}</th>
                        <th>{{ __('external.Status') }}</th>
                        <th>{{ __('payments.Note') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($credits as $credit)
                        <tr>
                            <td>
                                <a target="_blank" href="{{ route(getRouteName($credit->creditable_type, 'show'), [$prefix, $credit->creditable->id]) }}">
                                    <img class="img-fluid user-avatar-md rounded-circle" src="{{ makeProfileImg($credit->creditable->photo, true) }}">
                                    {{ $credit->creditable->name }}
                                </a>
                            </td>
                            <td>
                                <div class="badge badge-{{ $credit->creditable_type == "App\Models\Member" ? 'success' : 'brand' }}">
                                    {{ $credit->creditable_type == "App\Models\Member" ? __('members.Member') : __('vendors.Vendor') }}
                                </div>
                            </td>
                            <td>{{ ($website->currency ?? '') . $credit->amount }}</td>
                            <td>{{ $credit->payment_type }}</td>
                            <td>{{ $credit->payment_date }}</td>
                            <th>@include('partials.credit_status', ['credit' => $credit])</th>
                            <td>{{ $credit->note }}</td>
                            <td title="{{ $credit->created_at->diffForHumans() }}">
                                {{ $credit->created_at }}
                                @if($credit->created_at != $credit->updated_at)
                                    <div class="badge badge-brand" title="{{ __('general.Updated at') . ' ' . $credit->updated_at . ' (' . $credit->updated_at->diffForHumans() . ')' }}">{{ __('general.Updated') }}</div>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">
                                    <a href="{{ route('credits.edit', [$prefix, $credit->id]) }}" class="btn btn-brand btn-sm"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $credit->id }}, '{{ $credit->creditable_type }}')"><i class="fa fa-trash-alt"></i> {{ __('general.Delete') }}</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ __('general.User') }}</th>
                        <th>{{ __('general.Type') }}</th>
                        <th>{{ __('payments.Amount') }}</th>
                        <th>{{ __('payments.Payment type') }}</th>
                        <th>{{ __('payments.Payment date') }}</th>
                        <th>{{ __('external.Status') }}</th>
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
