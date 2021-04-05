<div>
    <style>
        body {
            overflow: hidden;
        }
    </style>
    <div class="row justify-content-center mt-5 py-5">
        <div class="col-md-3">
            @include('partials.session')
            <p class="text-dark text-center font-weight-bold h1 mb-3">{{ __('project.Manage projects') }}</p>
            @forelse($projects as $project)
                <div class="card px-0 shadow border">
                    <div class="card-header"><p class="font-weight-bold font-20">{{ __('auth.ID') . ': ' . $project->project }}</p> </div>
                    <div class="card-body">
                        <small class="text-muted font-12 text-right">{{ __('general.Created at') . ' ' . $project->created_at }}</small>
                        <p class="font-weight-bold text-dark font-22 mb-0"><a href="{{ route('home', $project->project) }}">{{ $project->name }}</a></p>
                        <p class="text-muted font-16 mt-0"><a href="{{ route('home', $project->project) }}">{{ route('home', $project->project) }}</a></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('home', $project->project) }}" class="btn btn-info btn-sm">{{ __('general.Go to dashboard') }}</a>
                        <a href="{{ route('website.settings', $project->project) }}" class="btn btn-warning btn-sm">{{ __('general.Edit') }}</a>
                        <details>
                            <summary>
                                {{ __('project.Delete project') }}
                            </summary>
                            <strong class="my-2">{{ __('general.Are you sure?') }}</strong><br>
                            <button onclick="return confirm('{{ __('general.Are you sure?') }}') || event.stopImmediatePropagation()"
                                    wire:click="deleteProject({{ $project->id }})" class="btn btn-danger btn-sm">{{ __('project.Delete project') }}
                            </button>
                        </details>
                    </div>
                </div>
            @empty
                <p>{{ __('project.You do not have a project yet') }}</p>
                <a href="{{ route('project.create', $prefix) }}" class="btn btn-success">{{ __('project.Create a Project') }}</a>
            @endforelse
        </div>
    </div>
</div>
