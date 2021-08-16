@if($model->updated_at != $model->created_at)
    <div class="badge badge-brand" title="{{ $model->updated_at . ' (' . $model->updated_at->diffForHumans() .')' }}">{{ __('general.Updated') }}</div>
@endif
