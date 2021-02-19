@extends('layouts.dashboard')

@section('content')
    @php
        $page = "Subscriptions";
        $breadcumbs = [__('Dashboard') => route('home'), __('Add subscriptions') => route('subscriptions.index')];
    @endphp
    <div class="card">
        <div class="card-header">
            <p class="h5 text-dark">{{ __('Add subscriptions') }}</p>
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form method="POST" action="{{ route('subscriptions.store') }}">
                @csrf
                <div class="form-group">
                    <label class="w-100">{{ __('Name') }}
                        <input type="text" class="form-control form-control-lg" name="name" placeholder="{{ __('Name') }}">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100">{{ __('Price') }}
                        <input type="number" class="form-control form-control-lg" name="price" placeholder="{{ __('Price') }}">
                    </label>
                </div>
                <div class="form-group">
                    <script>
                        function putOutput(val) {
                            // Tools
                            let options = document.querySelector('#duration_choose_options');
                            let custom = document.querySelector('#duration_choose_custom');
                            let select = document.querySelector('#duration');
                            let input = document.querySelector('#duration_text');
                            if (val === "options") {
                                select.style.display = "block";
                                input.style.display = "none";
                                input.name = "";
                                select.name = "duration";
                            } else if(val === "custom") {
                                select.style.display = "none";
                                input.style.display = "block";
                                input.name = "duration";
                                select.name = "";
                            }
                        }
                    </script>
                    <label class="w-100">{{ __('Duration') }}
                        <div>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input onclick="putOutput(this.value)" value="options" id="duration_choose_options" name="duration_inputs" type="radio" checked class="custom-control-input"><span class="custom-control-label">{{ __('Options') }}</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input onclick="putOutput(this.value)" value="custom" id="duration_choose_custom" name="duration_inputs" type="radio" class="custom-control-input"><span class="custom-control-label">{{ __('Custom') }}</span>
                            </label>
                        </div>
                        <input type="text" name="duration" id="duration_text" class="form-control form-control-lg" placeholder="{{ __('Duration') }}" style="display: none">
                        <select name="duration" id="duration" class="form-control form-control-lg">
                            <option value="30">{{ __('1 month') }}</option>
                            <option value="91">{{ __('3 months') }}</option>
                            <option value="183">{{ __('6 months') }}</option>
                            <option value="365">{{ __('1 year') }}</option>
                            <option value="731">{{ __('2 years') }}</option>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label>{{ __('plan.Features') }}</label> <br>
                    <select multiple class="form-control" name="features[]">
                        @foreach($features as $feature)
                            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-main text-light">{{ __('Save') }}</button>
            </form>
        </div>
    </div>
@endsection
