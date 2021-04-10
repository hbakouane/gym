<div>
    @include('partials.errors')
    @include('partials.toastr')
    <div class="card">
        <div class="card-body">
            <p class="text-dark font-bold font-20">{{ __('website.Project settings') }}</p>
            <form wire:submit.prevent="save">
                <div class="form-group">
                      <label class="w-100">{{ __('project.Project Name') }}
                          <input wire:model="name" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Address') }}
                          <input wire:model="address" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.City') }}
                          <input wire:model="city" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Zip') }}
                          <input wire:model="zip" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Country') }}
                          <select wire:model="country" class="form-control" style="height: 49px">
                              @include('partials.countries')
                          </select>
                      </label>
                </div>
                <div class="form-group">
                      <label class="w-100">{{ __('project.Currency') }}
                          <input wire:model="currency" type="text" class="form-control input">
                      </label>
                </div>
                <div class="form-group">
                    @php
                        $subscription = \App\Models\Saas\Subscription::where('user_id', auth()->id())->orderBy('id', 'DESC')->first();
                        $end = \App\Models\Project::where('project', $prefix)->first()->ended_at;
                    @endphp
                    <p class="font-18">{{ __('saas.Current plan') }}: <strong>{{ $subscription->plan->name ?? __('saas.Free trial') }}</strong></p>
                    <p class="font-18">{{ __('saas.Ended at') }}: <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $end)->format('l j F Y') . ' (' . (\Carbon\Carbon::createFromFormat('Y-m-d', $end)->format('d/m/Y')) . ')' }}</strong></p>
                </div>
                <button class="btn btn-main text-light">{{ __('general.Save') }}</button>
            </form>
        </div>
    </div>

    @if(filled($subscriptions))
        <div class="card">
            <div class="card-header font-16 text-dark">
                <p class="text-dark font-bold font-20">
                    {{ __('saas.My subscriptions') }}
                    <a class="btn btn-info" href="{{ route('plans.show', ['project' => request('project_id'), 'upgrade' => true]) }}">
                        <i class="fa fa-crown"></i> {{ __('saas.Upgrade') }}
                    </a>
                </p>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('saas.Plan') }}</th>
                        <th scope="col">{{ __('saas.Amount') }}</th>
                        <th scope="col">{{ __('saas.Status') }}</th>
                        <th scope="col">{{ __('saas.Payment method') }}</th>
                        <th scope="col">{{ __('expenses.Date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>
                            <th scope="row">#{{ $subscription->subscription_id }}</th>
                            <td>{{ $subscription->plan->name }}</td>
                            <td>${{ $subscription->amount }}</td>
                            <td>{{ ucfirst($subscription->status) }}</td>
                            <td>{{ $subscription->payment_method }}</td>
                            <!-- updated_at is the date the user paid in, because we update the subscription from Unpaid to Paid -->
                            <td>{{ $subscription->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('saas.Plan') }}</th>
                        <th scope="col">{{ __('saas.Amount') }}</th>
                        <th scope="col">{{ __('saas.Status') }}</th>
                        <th scope="col">{{ __('saas.Payment method') }}</th>
                        <th scope="col">{{ __('expenses.Date') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endif
</div>
