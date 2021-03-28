@php
    $permissions = str_replace(['"', '[', ']', ','], ' ', $permissions);
    $permissions = explode(' ', $permissions);
@endphp
@foreach($permissions as $permission)
    <span class="badge badge-primary">{{ $permission }}</span>
@endforeach
