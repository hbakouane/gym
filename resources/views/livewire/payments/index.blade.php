<div>
    <div class="card">
        <h5 class="card-header">
            {{ __('payments.Payments') }} <a href="{{ route('payments.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
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
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->member->name }}</td>
                            <td>{{ $website->prefix ?? '' . $payment->amount }}</td>
                            <td>{{ $payment->payment_type }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->note }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $payment->id }})">{{ __('general.Delete') }} <i class="fa fa-trash-alt"></i></button>
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
