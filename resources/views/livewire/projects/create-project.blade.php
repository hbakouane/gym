<div>
    <style>
        * {
            margin: 0;
            padding: 0
        }
        body {
            transition: 2s;
        }
        html {
            height: 100%
        }

        #grad1 {
            background-color: : #9C27B0;
            background-image: linear-gradient(120deg, #FF4081, #81D4FA)
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }
        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
            transition: 2s;
        }

        #progressbar .active {
            color: #000000;
            transition: 2s;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 33.33%;
            float: left;
            position: relative;
            transition: 2s;
        }

        #progressbar #account:before {
            font-family: "Font Awesome\ 5 Free";
            content: "\f128";
            font-weight: 900;
            transition: 2s;
        }

        #progressbar #personal:before {
            font-family: "Font Awesome 5 Free";
            content: "\f007";
            font-weight: 900;
            transition: 2s;
        }

        #progressbar #payment:before {
            font-family: "Font Awesome 5 Free";
            content: "\f09d";
            font-weight: 900;
            transition: 2s;
        }

        #progressbar #confirm:before {
            font-family: "Font Awesome 5 Free";
            content: "\f00c";
            font-weight: 900;
            transition: 2s;
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
            transition: .5s;
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
            transition: .5s;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #3d405c;
            transition: .5s;
        }

        /* SVG ICON */
        #tick {
            stroke: #63bc01;
            stroke-width: 6;
            transition: all 1s;
        }

        #circle {
            stroke: #63bc01;
            stroke-width: 6;
            transform-origin: 50px 50px 0;
            transition: all 1s;
        }
        .progressS {
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            border-radius: .25rem;
            height: 100px;
        }
        .progressS #tick {
            opacity: 0;
        }

        .ready #tick {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: draw 8s ease-out forwards;
        }

        .progressS #circle {
            stroke-dasharray: 314;
            stroke-dashoffset: 1000;
            animation: spin 3s linear infinite;
        }

        .ready #circle {
            stroke-dashoffset: 66;
            stroke: #63bc01;
        }

        #circle {
            stroke-dasharray: 500;
        }

        .iti.iti--allow-dropdown {
            width: 100%;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
                stroke-dashoffset: 66;
            }
            50% {
                transform: rotate(540deg);
                stroke-dashoffset: 314;
            }
            100% {
                transform: rotate(1080deg);
                stroke-dashoffset: 66;
            }
        }

        @keyframes draw {
            to {
                stroke-dashoffset: 0;
            }
        }

        #check {
            width: 100px;
            height: 100px;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center mt-0">
            <div class="col-md-8">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3 text-center">
                    <h2><strong>{{ __('project.Create your project now.') }}</strong></h2>
                    <div class="justify-content-center d-flex mb-2">
                        <div class="border p-1 rounded px-4">
                            <p>
                                <i class="fa fa-lock text-success"></i> <span class="text-success">https://</span>{{ 'www.' . env('APP_URL') . '/' }}<span class="text-success">{{ $Project }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <div id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar" style="cursor: pointer; transition: 2s">
                                    <li class="active" id="account" style="transition: 2s"><strong>{{ __('project.Project information') }}</strong></li>
                                    <li @if($step2 OR $step3 OR $step4) class="active" @endif id="personal" style="transition: 2s"><strong>{{ __('project.Personal Information') }}</strong></li>
{{--                                    <li @if($step3 OR $step4) class="active" @endif id="payment" style="transition: 2s"><strong>{{ __('project.Payment') }}</strong></li>--}}
                                    <li @if($step4) class="active" @endif id="confirm" style="transition: 2s"><strong>{{ __('project.Finish') }}</strong></li>
                                </ul>
                                <!-- fieldsets -->
                            @if($step1)
                                    <fieldset>
                                        <hr class="mt-0 mb-4">
                                        <div class="w-75 mx-auto">
                                            <p class="text-dark h5 text-left">{{ __('project.Tell us a little about your project.') }}</p>
                                            <form wire:submit.prevent="saveStepOne">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Project Name') }}
                                                                <input type="text" class="{{ handleErrorClass($errors, 'ProjectName', ' ') }} form-control input" wire:model="ProjectName">
                                                            </label>
                                                            @error('ProjectName')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Project Id') }}
                                                                <input type="text" class="{{ handleErrorClass($errors, 'Project', ' ') }} form-control input" wire:model="Project">
                                                            </label>
                                                            @error('Project')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Country') }}
                                                                <select wire:model="Country" class="{{ handleErrorClass($errors, 'Country', ' ') }} form-control" style="height: 49px">
                                                                    @include('partials.countries')
                                                                </select>
                                                            </label>
                                                            @error('Country')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.City') }}
                                                                <input type="text" class="{{ handleErrorClass($errors, 'City', ' ') }} form-control input" wire:model="City">
                                                            </label>
                                                            @error('City')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Address') }}
                                                                <input type="text" class="{{ handleErrorClass($errors, 'Address', ' ') }} form-control input" wire:model="Address">
                                                            </label>
                                                            @error('Address')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Zip') }}
                                                                <input type="text" class="{{ handleErrorClass($errors, 'Zip', ' ') }} form-control input" wire:model="Zip">
                                                            </label>
                                                            @error('Zip')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-main text-light">{{ __('project.Continue') }}</button>
                                            </form>
                                        </div>
                                    </fieldset>
                                @endif
                                @if($step2)
                                    <fieldset>
                                        <hr class="mt-0 mb-4">
                                        <div class="w-75 mx-auto">
                                            <p class="text-dark h5 text-left">{{ __('project.Tell us a little about your self.') }}</p>
                                            <form wire:submit.prevent="saveStepTwo" id="second_form">
                                                <script>
                                                    // let makeTel = () => {
                                                    //     alert('hello')
                                                    //     var input = document.querySelector("#phone");
                                                    //     window.intlTelInput(input, {
                                                    //         // any initialisation options go here
                                                    //     });
                                                    // }
                                                    // window.makeTel = makeTel()
                                                    // setInterval(makeTel(), 1000)
                                                </script>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Phone') }}
                                                                <input onchange="makeTel()" type="text" class="{{ handleErrorClass($errors, 'UserPhone', ' ') }} w-100 form-control input" wire:model="UserPhone">
                                                            </label>
                                                            @error('UserPhone')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Address') }}
                                                                <input type="text" class="{{ handleErrorClass($errors, 'UserAddress', ' ') }} form-control input" wire:model="UserAddress">
                                                            </label>
                                                            @error('UserAddress')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.City') }}
                                                                <input type="text" class="{{ handleErrorClass($errors, 'UserCity', ' ') }} form-control input" wire:model="UserCity">
                                                            </label>
                                                            @error('UserCity')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Country') }}
                                                                <select class="{{ handleErrorClass($errors, 'UserCountry', ' ') }} form-control" style="height: 49px" wire:model="UserCountry">
                                                                    @include('partials.countries')
                                                                </select>
                                                            </label>
                                                            @error('UserCountry')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="w-100 text-left">{{ __('project.Currency') }}
                                                                <input wire:model="Currency" type="text" class="{{ handleErrorClass($errors, 'Currency', ' ') }} form-control input">
                                                            </label>
                                                            @error('Currency')
                                                            <p class="text-left"><small class="text-danger">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-2">
                                                        <button class="btn btn-main text-light" type="button" wire:click="handleToggle('step1', 'step2')">{{ __('project.Previous') }}</button>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-main text-light" type="submit">{{ __('project.Continue') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </fieldset>
                                @endif
{{--                                @if($step3)--}}
{{--                                    <fieldset>--}}
{{--                                        <hr>--}}
{{--                                        <div class="w-75 mx-auto">--}}
{{--                                            <form wire:submit.prevent="saveStepThree">--}}
{{--                                                Plans should be there--}}
{{--                                                <div class="row justify-content-center">--}}
{{--                                                    <div class="col-md-2">--}}
{{--                                                        <button class="btn btn-main text-light" type="button" wire:click="handleToggle('step2', 'step3')">{{ __('project.Previous') }}</button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-2">--}}
{{--                                                        <button class="btn btn-main text-light" type="submit">{{ __('project.Finish') }}</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                @endif--}}
                                @if($step4)
                                    <fieldset>
                                        <div class="w-75 mx-auto">
                                            <h2 class="fs-title text-center mb-0" id="progress_text" style="transition: 2s">Loading . . .</h2> <br><br>
                                            <div class="mt-0">
                                                <svg id="check" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" xml:space="preserve">
                                                <circle id="circle" cx="50" cy="50" r="46" fill="transparent" />
                                                        <polyline id="tick" points="25,55 45,70 75,33" fill="transparent" />
                                                </svg>
                                            </div>
                                            <script>
                                                // Show progress sentences
                                                let progress_text = document.querySelector('#progress_text');
                                                setTimeout(() => {
                                                    progress_text.textContent = "{{ __('project.Creating your project . . .') }}";
                                                }, 2000);
                                                setTimeout(() => {
                                                    progress_text.textContent = "{{ __('project.Preparing the project environment . . .') }}";
                                                }, 4000);
                                                setTimeout(() => {
                                                    progress_text.textContent = "{{ __('project.Project created successfully!') }}";
                                                    setTimeout(() => {
                                                        progress_text.classList.add('text-success');
                                                        setTimeout(() => {
                                                            progress_text.classList.remove('text-success');
                                                            setTimeout(() => {
                                                                progress_text.classList.add('text-success');
                                                                setTimeout(() => {
                                                                    progress_text.classList.remove('text-success');
                                                                    setTimeout(() => {
                                                                        progress_text.classList.add('text-success');
                                                                        setTimeout(() => {
                                                                            progress_text.classList.remove('text-success');
                                                                            setTimeout(() => {
                                                                                progress_text.classList.add('text-success');
                                                                                setTimeout(() => {
                                                                                    progress_text.classList.remove('text-success');
                                                                                    progress_text.textContent = "{{ __('project.Redirecting to dashboard . . . ') }}";
                                                                                    setTimeout(() => {
                                                                                        // Redirect to the project dashboard
                                                                                        window.location.href = "{{ route('home', $Project) }}";
                                                                                    }, 2500)
                                                                                }, 1500)
                                                                            }, 1400)
                                                                        }, 1200)
                                                                    }, 1000)
                                                                }, 800)
                                                            }, 600)
                                                        }, 400)
                                                    }, 200);
                                                }, 10000);
                                                setTimeout(() => {
                                                    progress_text.textContent = "{{ __('project.Project created successfully!') }}";
                                                }, 12000);
                                                // Show svg icon (src = https://codepen.io/splitti/pen/jLZjgx)
                                                const svg = document.getElementById('check')
                                                svg.classList.add('progressS')
                                                setInterval(() => {
                                                    svg.classList.toggle('progressS')
                                                    svg.classList.toggle('ready')
                                                }, 10000)
                                            </script>
                                        </div>
                                    </fieldset>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(\App\Models\Project::where('user_id', auth()->id())->get())
            <div class="row justify-content-center mt-0">
                <div class="col-md-8">
                    @foreach($projects as $project)
                        <div class="card px-0 shadow border">
                            <div class="card-body">
                                <small class="text-muted font-12 text-right">{{ __('general.Created at') . ' ' . $project->created_at }}</small>
                                <p class="font-weight-bold text-dark font-22 mb-0"><a href="{{ route('home', $project->project) }}">{{ $project->name }}</a></p>
                                <p class="text-muted font-16 mt-0"><a href="{{ route('home', $project->project) }}">{{ route('home', $project->project) }}</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>