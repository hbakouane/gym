<div>
    @include('partials.toastr')
    <div class="card">
        <h5 class="card-header">
            {{ __('pages.Staves') }} <a href="{{ route('staves.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first datatableTable">
                    <thead>
                    <tr>
                        <th>{{ __('auth.Name') }}</th>
                        <th>{{ __('auth.Role') }}</th>
                        <th>{{ __('auth.Email') }}</th>
                        <th>{{ __('auth.Phone') }}</th>
                        <th>{{ __('auth.CNE') }}</th>
                        <th>{{ __('auth.Address') }}</th>
                        <th>{{ __('auth.City') }}</th>
                        <th>{{ __('auth.Country') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $staff)
                        <tr>
                            <td><img class="user-avatar-md rounded-circle" src="{{ makeProfileImg($staff->photo, true) }}"> {{ $staff->name }}</td>
                            <td><span class="badge badge-brand">{{ $staff->role->name }}</span></td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ $staff->phone }}</td>
                            <td>{{ $staff->cne }}</td>
                            <td>{{ $staff->address }}</td>
                            <td>{{ $staff->city }}</td>
                            <td>{{ $staff->country }}</td>
                            <td title="{{ $staff->created_at->diffForHumans() }}">
                                {{ $staff->created_at }}
                                @if($staff->created_at != $staff->updated_at)
                                    <div class="badge badge-brand" title="{{ __('general.Updated at') . ' ' . $staff->updated_at . ' (' . $staff->updated_at->diffForHumans() . ')' }}">{{ __('general.Updated') }}</div>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">
                                    <a href="{{ route('staves.edit', [$prefix, $staff->id]) }}" class="btn btn-brand btn-sm"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $staff->id }})"><i class="fa fa-trash-alt"></i> {{ __('general.Delete') }}</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ __('auth.Name') }}</th>
                        <th>{{ __('auth.Role') }}</th>
                        <th>{{ __('auth.Email') }}</th>
                        <th>{{ __('auth.Phone') }}</th>
                        <th>{{ __('auth.CNE') }}</th>
                        <th>{{ __('auth.Address') }}</th>
                        <th>{{ __('auth.City') }}</th>
                        <th>{{ __('auth.Country') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
