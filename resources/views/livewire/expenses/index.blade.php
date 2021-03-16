<div>
    @include('partials.toastr')
    <div class="card">
        <h5 class="card-header">
            {{ __('pages.Expenses') }} <a href="{{ route('expenses.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first datatableTable">
                    <thead>
                    <tr>
                        <th>{{ __('expenses.Vendor') }}</th>
                        <th>{{ __('expenses.Amount') }}</th>
                        <th>{{ __('expenses.Service or purchase') }}</th>
                        <th>{{ __('expenses.Date') }}</th>
                        <th>{{ __('expenses.Note') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <td>{{ __('general.Actions') }}</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expenses as $expense)
                        <tr>
                            <td>{{ $expense->vendor }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ $expense->service }}</td>
                            <td>{{ $expense->date }}</td>
                            <td>{{ $expense->note }}</td>
                            <td title="{{ $expense->created_at->diffForHumans() }}">
                                {{ $expense->created_at }}
                                @include('partials.updated', ['model' => $expense])
                            </td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">
                                    <a href="{{ route('expenses.edit', [$prefix, $expense->id]) }}" class="btn btn-brand btn-sm"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $expense->id }})"><i class="fa fa-trash-alt"></i> {{ __('general.Delete') }}</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ __('expenses.Vendor') }}</th>
                        <th>{{ __('expenses.Amount') }}</th>
                        <th>{{ __('expenses.Service or purchase') }}</th>
                        <th>{{ __('expenses.Date') }}</th>
                        <th>{{ __('expenses.Note') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <td>{{ __('general.Actions') }}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
