<div wire:poll>
    @include('partials.errors')
    @include('partials.toastr')
    <form wire:submit.prevent="save" class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="w-100">{{ __('expenses.Amount') }}
                            <input wire:model="amount" type="number" class="form-control input">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-100">{{ __('expenses.Vendor') }}
                            <input wire:model="vendor" class="form-control input">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-100">{{ __('expenses.Date') }}
                            <input wire:model="date" type="date" class="form-control input">
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="w-100">{{ __('expenses.Service or purchase') }}
                            <textarea wire:model="service" rows="2" class="form-control input"></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-100">{{ __('expenses.Note') }}
                            <textarea wire:model="note" rows="6" class="form-control input"></textarea>
                        </label>
                    </div>
                </div>
                <div class="pl-3">
                    <button class="btn btn-main text-light">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
