@php
    $permissions = str_replace(['"', '[', ']', ','], ' ', $staff->role->permissions);
    $permissions = explode(' ', $permissions);
@endphp
@foreach($permissions as $permission)
    <span class="badge badge-primary">{{ $permission }}</span>
@endforeach
