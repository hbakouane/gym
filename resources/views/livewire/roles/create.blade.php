<div>
    @include('partials.toastr')
    <div class="col-md-6 card">
        <div class="card-body">
            @include('partials.errors')
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label>Role</label>
                    <input class="form-control input" wire:model="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-main text-light">{{ __('general.Save') }}</button>
                </div>
            </form>
        </div>
    </div>

    @if($roleCreated)
        <div class="col-md-12 card">
            <div class="card-body">
                @include('partials.errors')
                <form method="POST" action="{{ route('permissions.store', [$prefix, 'role' => $role]) }}">
                    @csrf
                    <label>{{ __('roles.Permissions') }}</label>
                    <div class="row">
                        <div class="col-md-4">
                            <label>
                                <input type="checkbox" name="permissions[]" value="home"> Dashboard <br>
                            </label>

                            <hr>

                            <label>
                                <input type="checkbox" name="permissions[]" value="members.index"> {{ __('roles.See members') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="members.create"> {{ __('roles.Create members') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="members.show"> {{ __('roles.Show members') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="members.edit"> {{ __('roles.Edit members') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="members.delete"> {{ __('roles.Delete members') }}
                            </label><br>

                            <hr>

                            <label>
                                <input type="checkbox" name="permissions[]" value="features.index"> {{ __('roles.See features') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="features.create"> {{ __('roles.Create features') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="features.show"> {{ __('roles.Show features') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="features.edit"> {{ __('roles.Edit features') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="features.delete"> {{ __('roles.Delete features') }}
                            </label><br>

                            <hr>

                            <label>
                                <input type="checkbox" name="permissions[]" value="subscriptions.index"> {{ __('roles.See subscriptions') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="subscriptions.create subscriptions.store"> {{ __('roles.Create subscriptions') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="subscriptions.show"> {{ __('roles.Show subscriptions') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="subscriptions.edit"> {{ __('roles.Edit subscriptions') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="subscriptions.delete"> {{ __('roles.Delete subscriptions') }}
                            </label><br>

                            <hr>
                        </div>

                        <div class="col-md-4">
                            <label>
                                <input type="checkbox" name="permissions[]" value="payments.index"> {{ __('roles.See payments') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="payments.create"> {{ __('roles.Create payments') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="payments.show"> {{ __('roles.Show payments') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="payments.edit"> {{ __('roles.Edit payments') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="payments.delete"> {{ __('roles.Delete payments') }}
                            </label><br>

                            <hr>

                            <label>
                                <input type="checkbox" name="permissions[]" value="vendors.index"> {{ __('roles.See vendors') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="vendors.create"> {{ __('roles.Create vendors') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="vendors.show"> {{ __('roles.Show vendors') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="vendors.edit"> {{ __('roles.Edit vendors') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="vendors.delete"> {{ __('roles.Delete vendors') }}
                            </label><br>

                            <hr>

                            <label>
                                <input type="checkbox" name="permissions[]" value="credits.index"> {{ __('roles.See credits') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="credits.create"> {{ __('roles.Create credits') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="credits.show"> {{ __('roles.Show credits') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="credits.edit"> {{ __('roles.Edit credits') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="credits.delete"> {{ __('roles.Delete credits') }}
                            </label><br>

                            <hr>
                        </div>

                        <div class="col-md-4">
                            <label>
                                <input type="checkbox" name="permissions[]" value="expenses.index"> {{ __('roles.See expenses') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="expenses.create"> {{ __('roles.Create expenses') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="expenses.show"> {{ __('roles.Show expenses') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="expenses.edit"> {{ __('roles.Edit expenses') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="expenses.delete"> {{ __('roles.Delete expenses') }}
                            </label><br>

                            <hr>

                            <label>
                                <input type="checkbox" name="permissions[]" value="roles.index"> {{ __('roles.See roles') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="roles.create permissions.store"> {{ __('roles.Create roles') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="roles.show"> {{ __('roles.Show roles') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="roles.edit"> {{ __('roles.Edit roles') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="roles.delete"> {{ __('roles.Delete roles') }}
                            </label><br>

                            <hr>

                            <label>
                                <input type="checkbox" name="permissions[]" value="staves.index"> {{ __('roles.See staves') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="staves.create"> {{ __('roles.Create staves') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="staves.show"> {{ __('roles.Show staves') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="staves.edit"> {{ __('roles.Edit staves') }}
                            </label><br>
                            <label>
                                <input type="checkbox" name="permissions[]" value="staves.delete"> {{ __('roles.Delete staves') }}
                            </label><br>
                        </div>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <button type="button" class="btn btn-info btn-sm text-light" onclick="selectAllOptions">{{ __('roles.Select all') }}</button>--}}
{{--                        <button type="button" class="btn btn-info btn-sm text-light" onclick="unselectAllOptions">{{ __('roles.Unselect all') }}</button>--}}
{{--                        <script>--}}
{{--                            function selectAllOptions() {--}}
{{--                                document.querySelectorAll("[name= 'permissions[]']").forEach(input => {--}}
{{--                                    input.checked = true--}}
{{--                                })--}}
{{--                            }--}}
{{--                            function unselectAllOptions() {--}}
{{--                                document.querySelectorAll("[name= 'permissions[]']").forEach(input => {--}}
{{--                                    input.checked = false--}}
{{--                                })--}}
{{--                            }--}}
{{--                        </script>--}}
{{--                    </div>--}}
                    <div class="alert alert-warning">
                        <strong>{{ __('general.Example') }}:</strong>
                        <ul>
                            <li>{{ __('roles.See members') }}: {{ __('roles.Staff can see all the members') }} </li>
                            <li>{{ __('roles.Create members') }}: {{ __('roles.Staff can create a member') }} </li>
                            <li>{{ __('roles.Show members') }}: {{ __('roles.Staff can see a member\'s details') }} </li>
                            <li>{{ __('roles.Edit members') }}: {{ __('roles.Staff can edit and update a member\'s information') }} </li>
                            <li>{{ __('roles.Delete members') }}: {{ __('roles.Staff can delete a member permanently') }} </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-main text-light">{{ __('general.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
