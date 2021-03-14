<div>
    <div class="card">
        <h5 class="card-header">
            {{ __('credits.Credits') }} <a href="{{ route('credits.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first" id="datatable">
                    <thead>
                    <tr>
                        <th>{{ __('members.Member') }}</th>
                        <th>{{ __('payments.Amount') }}</th>
                        <th>{{ __('payments.Payment type') }}</th>
                        <th>{{ __('payments.Payment date') }}</th>
                        <th>{{ __('payments.Note') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($credits as $credit)
                        <tr>
                            <td>
                                <a target="_blank" href="{{ route('members.show', [$prefix, $credit->member->id]) }}">
                                    <img class="img-fluid user-avatar-md rounded-circle" src="{{ makeProfileImg($credit->member->photo, true) }}">
                                    {{ $credit->member->name }}
                                </a>
                            </td>
                            <td>{{ $website->prefix ?? '' . $credit->amount }}</td>
                            <td>{{ $credit->payment_type }}</td>
                            <td>{{ $credit->payment_date }}</td>
                            <td>{{ $credit->note }}</td>
                            <td>{{ $credit->created_at }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">
                                    <a href="{{ route('members.show', [$prefix, $credit->member->id, 'payments' => true]) }}" class="btn btn-info text-light btn-sm"><i class="fa fa-eye"></i> {{ __('general.Show') }}</a>
                                    <a href="{{ route('credits.edit', [$prefix, $credit->id]) }}" class="btn btn-brand btn-sm"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $credit->id }})"><i class="fa fa-trash-alt"></i> {{ __('general.Delete') }}</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ __('members.Member') }}</th>
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
