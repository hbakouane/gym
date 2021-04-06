@guest
    <a href="#" class="btn btn-turquoise btn-xxl-1 font-size-5 text-firefly font-weight-semibold">{{ __('external.trial') }}</a>
@endguest

@auth
    <a class="btn btn-light py-3" href="{{ route('projects.manage') }}">
        {{ __('project.Manage projects') }} >
    </a>
@endauth
