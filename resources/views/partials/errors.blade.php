@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li> {{ PHP_EOL }}
        @endforeach
    </div>
@endif
