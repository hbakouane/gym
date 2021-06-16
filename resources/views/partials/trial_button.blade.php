@guest
    <a href="{{ route('project.create') }}" class="btn @if(! empty($class)) {{ $class }} @else btn-main @endif radius">{{ __('external.trial') }}</a>
@endguest

@auth
    <a class="btn btn-light py-3" href="{{ route('projects.manage') }}">
        {{ __('project.Manage projects') }} >
    </a>
@endauth
