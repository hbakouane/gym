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
        <div class="col-md-6 card">
            <div class="card-body">
                @include('partials.errors')
                <form method="POST" action="{{ route('permissions.store', [$prefix, 'role' => $role]) }}">
                    @csrf
                    <label>{{ __('roles.Permissions') }}</label>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="permissions[]" value="home"> Dashboard <br>
                        </label>
                        <hr>
                        <label>
                            <input type="checkbox" name="permissions[]" value="members.index"> See members
                        </label><br>
                        <label>
                            <input type="checkbox" name="permissions[]" value="members.show"> Show members
                        </label><br>
                        <label>
                            <input type="checkbox" name="permissions[]" value="members.edit"> Edit members
                        </label><br>
                        <label>
                            <input type="checkbox" name="permissions[]" value="members.create"> Create members
                        </label><br>
                        <label>
                            <input type="checkbox" name="permissions[]" value="members.delete"> Delete members
                        </label><br>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-main text-light">{{ __('general.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
