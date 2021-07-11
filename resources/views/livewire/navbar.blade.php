<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-main fixed-top">
        @php
            $project = \App\Models\Project::where('project', request('project_id'))->first();
        @endphp
            <img class="img-fluid" src="{{ url('logo.png') }}" style="height: 75px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
{{--                <li class="nav-item">--}}
{{--                    <div id="custom-search" class="top-search-bar">--}}
{{--                        <input class="form-control" type="text" placeholder="Search..">--}}
{{--                    </div>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <a href="{{ route('memberships.create', $prefix) }}" class="btn btn-success text-light ml-4"><i class="fa fa-plus-circle"></i> {{ __('navbar.Membership') }}</a>
                    </div>
                </li>
                @php
                    $currentProject = \App\Models\Project::where('project', request('project_id'))->first();
                @endphp
                @if($currentProject->ended_at > now()->toDateString() AND $currentProject->trial == false)
                <!--<li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <a class="btn ml-3 btn-info rounded-pill" href="{{ route('plans.show', ['project' => $currentProject->project, 'upgrade' => true]) }}"><i class="fa fa-crown"></i> {{ __('saas.Upgrade') }} </a>
                    </div>
                </li>-->
                @endif
{{--                <li class="nav-item dropdown notification">--}}
{{--                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>--}}
{{--                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">--}}
{{--                        <li>--}}
{{--                            <div class="notification-title"> Notification</div>--}}
{{--                            <div class="notification-list">--}}
{{--                                <div class="list-group">--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action active">--}}
{{--                                        <div class="notification-info">--}}
{{--                                            <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
{{--                                            <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.--}}
{{--                                                <div class="notification-date">2 min ago</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action">--}}
{{--                                        <div class="notification-info">--}}
{{--                                            <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
{{--                                            <div class="notification-list-user-block"><span class="notification-list-user-name">{{ auth()->user()->name }}</span>is now following you--}}
{{--                                                <div class="notification-date">2 days ago</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action">--}}
{{--                                        <div class="notification-info">--}}
{{--                                            <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
{{--                                            <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository--}}
{{--                                                <div class="notification-date">2 min ago</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action">--}}
{{--                                        <div class="notification-info">--}}
{{--                                            <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
{{--                                            <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.--}}
{{--                                                <div class="notification-date">2 min ago</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="list-footer"> <a href="#">View all notifications</a></div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <!--<li class="nav-item dropdown nav-user my-auto">
                    <div class="dropdown show">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-language"></i> </a>

                        <form method="POST" onchange="this.submit()" action="{{ route('language.change') }}" class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink">
                            @csrf
                            <label class="custom-control custom-radio">
                                <input @if(session()->get('locale') == 'fr') checked=""  @endif value="fr" type="radio" name="lang" class="custom-control-input"><span class="custom-control-label"><img class="img-fluid rounded" style="height: 20px" src="https://www.makacla.com/photo/art/grande/6771020-10350548.jpg?v=1404162660"></span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input @if(session()->get('locale') == 'en') checked=""  @endif value="en" type="radio" name="lang" class="custom-control-input"><span class="custom-control-label"><img class="img-fluid rounded" style="height: 20px" src="https://www.ismac.fr/wp-content/uploads/2017/09/drapeau-anglais.png"></span>
                            </label>
                        </form>
                    </div>
                </li>-->
                @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                    <!--<li class="nav-item dropdown connection">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                            <li class="connection-list">
                                <div class="row">
                                    @foreach(\App\Models\Project::where('user_id', auth()->id())->get() as $project)
                                        <div class="col-md-12">
                                            <a href="{{ route('home', $project->project) }}" class="connection-item"><span>{{ $project->name }}</span></a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('project.create') }}" class="btn btn-outline-success btn-sm mt-3">{{ __('project.Create a Project') }}</a>
                                </div>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <div class="conntection-footer"><a href="#">More</a></div>--}}
                            {{--                            </li>--}}
                        </ul>
                    </li>-->
                @endif
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-fluid rounded-circle" style="height: 40px;" src="{{ url('user.png') }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{ auth()->user()->name }} </h5>
                            <span class="status"></span><span class="ml-2"><i class="fa fa-circle text-success"></i> Available</span>
                        </div>
                        {{--                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>--}}
                        <a class="dropdown-item" href="{{ route('user.settings.show', $prefix) }}"><i class="fas fa-cog mr-2"></i>{{ __('settings.Settings') }}</a>
                        @if(auth()->guard('web')->check())
                            <a class="dropdown-item" href="{{ route('projects.manage') }}"><i class="fas fa-cog mr-2"></i>{{ __('settings.Manage my projects') }}</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item" style="cursor: pointer"><i class="fas fa-power-off mr-2"></i>Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
