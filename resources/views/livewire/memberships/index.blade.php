<div>
    @include('partials.toastr')
    <div class="card">
        <h5 class="card-header">
            {{ __('pages.All Memberships') }} <a href="{{ route('memberships.create', $prefix) }}" class="btn mr-0 btn-primary btn-sm"><i class="fa fa-plus-circle"></i></a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first datatableTable">
                    <thead>
                    <tr>
                        <th>{{ __('membership.ID') }}</th>
                        <th>{{ __('membership.Member') }}</th>
                        <th>{{ __('membership.Amount') }}</th>
                        <th>{{ __('membership.Status') }}</th>
                        <th>{{ __('membership.Served by') }}</th>
                        <th>{{ __('membership.Note') }}</th>
                        <th>{{ __('membership.Started at') }}</th>
                        <th>{{ __('membership.Ended at') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($memberships as $membership)
                        <tr>
                            <td>{{ '#' . $membership->membership_id }}</td>
                            <td>
                                <a target="_blank" href="{{ route('members.show', [$prefix, $membership->member->id]) }}">
                                    <img class="img-fluid user-avatar-md rounded-circle" src="{{ makeProfileImg($membership->member->photo, true) }}">
                                    {{ $membership->member->name }}
                                </a>
                            </td>
                            <td>{{ $website->prefix ?? '' . $membership->amount }}</td>
                            <td>
                                @include('partials.membership_status', ['member' => $membership->member])
                            </td>
                            <td>
                                @if(str_contains($membership->model_type, 'User'))
                                    @php
                                        $user = \App\Models\User::find($membership->model_id);
                                    @endphp
                                    <a href="{{ route('user.settings.show', [$prefix, $user->id]) }}">
                                        <img class="img-fluid user-avatar-md rounded-circle" src="{{ makeProfileImg($user->photo, true) }}">
                                        {{ $user->name }}
                                    </a>
                                @elseif(str_contains($membership->model_type, 'Staff'))
                                    <a target="_blank" href="{{ route('staves.show', [$prefix, $membership->model_id]) }}">
                                        <img class="img-fluid user-avatar-md rounded-circle" src="{{ makeProfileImg($membership->member->photo, true) }}">
                                        {{ $membership->model_id->name }}
                                    </a>
                                @endif
                            </td>
                            <td>{{ $membership->note }}</td>
                            <td>{{ $membership->member->started_at }}</td>
                            <td>{{ $membership->member->ended_at }}</td>
                            <td>
                                <p title="{{ $membership->created_at->diffForHumans() }}">{{ $membership->created_at }} @include('partials.updated', ['model' => $membership])
                            </td>
                            <td class="d-flex justify-content-center">
                                <div class="d-inline-block">

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('general.Are you sure?') }}') || event.stopImmediatePropagation()" wire:click="delete({{ $membership->id }})"><i class="fa fa-trash-alt"></i> {{ __('general.Delete') }}</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{{ __('membership.ID') }}</th>
                            <th>{{ __('membership.Member') }}</th>
                            <th>{{ __('membership.Amount') }}</th>
                            <th>{{ __('membership.Status') }}</th>
                            <th>{{ __('membership.Served by') }}</th>
                            <th>{{ __('membership.Note') }}</th>
                            <th>{{ __('membership.Started at') }}</th>
                            <th>{{ __('membership.Ended at') }}</th>
                        <th>{{ __('general.Created at') }}</th>
                        <th>{{ __('general.Actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
