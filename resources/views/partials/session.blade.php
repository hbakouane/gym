@if (session('status'))
    <div class="alert alert-success {{ $class ?? '' }}" role="alert">
        {{ session('status') }}
    </div>
@endif
