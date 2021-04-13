@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('roles.Edit role');
        $breadcumbs = ['Dashboard' => route('home', [$prefix]), $page => route('roles.edit', [$prefix, $role->id])];
    @endphp
    <div class="col-md-12 card">
        <div class="card-body">
            @include('partials.errors')
            <form method="POST" action="{{ route('permissions.store', [$prefix, 'role' => $role]) }}">
                @csrf
                <span class="btn btn-brand btn-rounded mb-3">{{ $role->name }}</span><br>
                <label>{{ __('roles.Permissions') }}</label>
                <div class="row">
                    <div class="col-md-4">
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'home') }} name="permissions[]" value="home"> {{ __('general.Dashboard') }} <br>
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'home.allowed') }} name="permissions[]" value="home.allowed"> {{ __('roles.Staves can see the statistiques') }} <br>
                        </label>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'members.index') }} name="permissions[]" value="members.index"> {{ __('roles.See members') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'members.create') }} name="permissions[]" value="members.create"> {{ __('roles.Create members') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'members.show') }} name="permissions[]" value="members.show"> {{ __('roles.Show members') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'members.edit') }} name="permissions[]" value="members.edit"> {{ __('roles.Edit members') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'members.delete') }} name="permissions[]" value="members.delete"> {{ __('roles.Delete members') }}
                        </label><br>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'features.index') }} name="permissions[]" value="features.index"> {{ __('roles.See features') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'features.create') }} name="permissions[]" value="features.create"> {{ __('roles.Create features') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'features.show') }} name="permissions[]" value="features.show"> {{ __('roles.Show features') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'features.edit') }} name="permissions[]" value="features.edit"> {{ __('roles.Edit features') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'features.delete') }} name="permissions[]" value="features.delete"> {{ __('roles.Delete features') }}
                        </label><br>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'subscriptions.index') }} name="permissions[]" value="subscriptions.index"> {{ __('roles.See subscriptions') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'subscriptions.create subscriptions.store') }} name="permissions[]" value="subscriptions.create subscriptions.store"> {{ __('roles.Create subscriptions') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'subscriptions.show') }} name="permissions[]" value="subscriptions.show"> {{ __('roles.Show subscriptions') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'subscriptions.edit') }} name="permissions[]" value="subscriptions.edit"> {{ __('roles.Edit subscriptions') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'subscriptions.delete') }} name="permissions[]" value="subscriptions.delete"> {{ __('roles.Delete subscriptions') }}
                        </label><br>

                        <hr>
                    </div>

                    <div class="col-md-4">
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'payments.index') }} name="permissions[]" value="payments.index"> {{ __('roles.See payments') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'payments.create') }} name="permissions[]" value="payments.create"> {{ __('roles.Create payments') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'payments.show') }} name="permissions[]" value="payments.show"> {{ __('roles.Show payments') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'payments.edit') }} name="permissions[]" value="payments.edit"> {{ __('roles.Edit payments') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'payments.delete') }} name="permissions[]" value="payments.delete"> {{ __('roles.Delete payments') }}
                        </label><br>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'vendors.index') }} name="permissions[]" value="vendors.index"> {{ __('roles.See vendors') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'vendors.create') }} name="permissions[]" value="vendors.create"> {{ __('roles.Create vendors') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'vendors.show') }} name="permissions[]" value="vendors.show"> {{ __('roles.Show vendors') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'vendors.edit') }} name="permissions[]" value="vendors.edit"> {{ __('roles.Edit vendors') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'vendors.delete') }} name="permissions[]" value="vendors.delete"> {{ __('roles.Delete vendors') }}
                        </label><br>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'credits.index') }} name="permissions[]" value="credits.index"> {{ __('roles.See credits') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'credits.create') }} name="permissions[]" value="credits.create"> {{ __('roles.Create credits') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'credits.show') }} name="permissions[]" value="credits.show"> {{ __('roles.Show credits') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'credits.edit') }} name="permissions[]" value="credits.edit"> {{ __('roles.Edit credits') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'credits.delete') }} name="permissions[]" value="credits.delete"> {{ __('roles.Delete credits') }}
                        </label><br>

                        <hr>
                    </div>

                    <div class="col-md-4">
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'expenses.index') }} name="permissions[]" value="expenses.index"> {{ __('roles.See expenses') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'expenses.create') }} name="permissions[]" value="expenses.create"> {{ __('roles.Create expenses') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'expenses.show') }} name="permissions[]" value="expenses.show"> {{ __('roles.Show expenses') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'expenses.edit') }} name="permissions[]" value="expenses.edit"> {{ __('roles.Edit expenses') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'expenses.delete') }} name="permissions[]" value="expenses.delete"> {{ __('roles.Delete expenses') }}
                        </label><br>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'roles.index') }} name="permissions[]" value="roles.index"> {{ __('roles.See roles') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'roles.create permissions.store') }} name="permissions[]" value="roles.create permissions.store"> {{ __('roles.Create roles') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'roles.show') }} name="permissions[]" value="roles.show"> {{ __('roles.Show roles') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'roles.edit') }} name="permissions[]" value="roles.edit"> {{ __('roles.Edit roles') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'roles.delete') }} name="permissions[]" value="roles.delete"> {{ __('roles.Delete roles') }}
                        </label><br>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'staves.index') }} name="permissions[]" value="staves.index"> {{ __('roles.See staves') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'staves.create') }} name="permissions[]" value="staves.create"> {{ __('roles.Create staves') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'staves.show') }} name="permissions[]" value="staves.show"> {{ __('roles.Show staves') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'staves.edit') }} name="permissions[]" value="staves.edit"> {{ __('roles.Edit staves') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'staves.delete') }} name="permissions[]" value="staves.delete"> {{ __('roles.Delete staves') }}
                        </label><br>

                        <hr>

                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'memberships.index') }} name="permissions[]" value="memberships.index"> {{ __('roles.See members memberships') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'memberships.create') }} name="permissions[]" value="memberships.create"> {{ __('roles.Create members memberships') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'memberships.show') }} name="permissions[]" value="memberships.show"> {{ __('roles.Show members memberships') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'memberships.edit') }} name="permissions[]" value="memberships.edit"> {{ __('roles.Edit members memberships') }}
                        </label><br>
                        <label>
                            <input type="checkbox" {{ checkRole($role->permissions, 'memberships.delete') }} name="permissions[]" value="memberships.delete"> {{ __('roles.Delete members memberships') }}
                        </label><br>
                    </div>
                </div>
                <div class="alert alert-warning">
                    <strong>{{ __('general.Example') }}:</strong>
                    <ul>
                        <li>{{ __('roles.See members') }}: {{ __('roles.Staff can see all the members') }} </li>
                        <li>{{ __('roles.Create members') }}: {{ __('roles.Staff can create a member') }} </li>
                        <li>{{ __('roles.Show members') }}: {{ __('roles.Staff can see a member\'s details') }} </li>
                        <li>{{ __('roles.Edit members') }}: {{ __('roles.Staff can edit and update a member\'s information') }} </li>
                    </ul>
                </div>
                <div class="form-group">
                    <button class="btn btn-main text-light">{{ __('general.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
