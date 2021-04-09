<div>
    <div>
        @include('partials.toastr')
        <div class="card">
            <h5 class="card-header">
                {{ __('pages.All roles') }} <a href="{{ route('roles.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="datatable">
                        <thead>
                        <tr>
                            <th>{{ __('auth.Role') . ' ' . lcfirst(__('auth.Name')) }}</th>
                            <th>{{ __('auth.Permissions') }}</th>
                            <th>{{ __('auth.Number of users') }}</th>
                            <th>{{ __('general.Created at') }}</th>
                            <th>{{ __('general.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @include('partials.permissions', ['permissions' => $role->permissions])
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-primary">{{ count(\App\Models\Staff::where('role_id', $role->id)->get()) }}</span>
                                </td>
                                <td title="{{ $role->created_at->diffForHumans() }}">
                                    {{ $role->created_at }}
                                </td>
                                <td class="d-flex justify-content-center">
                                    <div class="d-inline-block">
                                        <a href="{{ route('roles.edit', [$prefix, $role->id]) }}" class="btn btn-brand btn-sm"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                                        <button onclick="return confirm('{{ __('general.Are you sure?') . ' ' . __('roles.By deleting this role, all the staves that belong to it will be deleted at well. Are you sure?') }}') || event.stopImmediatePropagation()" wire:click="delete({{ $role->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> {{ __('general.Delete') }}</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('auth.Role') . ' ' . lcfirst(__('auth.Name')) }}</th>
                            <th>{{ __('auth.Permissions') }}</th>
                            <th>{{ __('auth.Number of users') }}</th>
                            <th>{{ __('general.Created at') }}</th>
                            <th>{{ __('general.Actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
