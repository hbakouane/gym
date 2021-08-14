<div>
    @if($toastr)
        <script>
            let timeOut = 3000;
            toastr.{{ $type }}('{{ __('plan.Feature deleted successfully.') }}', '',{timeOut})
            setTimeout(function () {
                let toastr = document.querySelector('#toastr_btn');
                toastr.click();
            }, timeOut);
        </script>
    @endif
    <button id="toastr_btn" type="button" wire:click="$toggle('toastr')"></button>
    <div class="card">
        <h5 class="card-header">
            {{ __('plan.Features') }} <a href="{{ route('features.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first" id="datatable">
                    <thead>
                    <tr>
                        <th>{{ __('plan.Feature') }}</th>
                        <th>{{ __('plan.Description') }}</th>
                        <th>{{ __('plan.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($features as $feature)
                        <tr>
                            <td>{{ $feature->name }}</td>
                            <td>{{ $feature->description }}</td>
                            <td>{{ $feature->created_at . ' (' . ($feature->created_at->diffForHumans()) . ')' }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">
                                    <button class="btn btn-danger btn-sm" wire:click="delete('{{ $feature->id }}')">{{ __('general.Delete') }} <i class="fa fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ __('plan.Feature') }}</th>
                        <th>{{ __('plan.Description') }}</th>
                        <th>{{ __('plan.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
