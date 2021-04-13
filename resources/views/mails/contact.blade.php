<div>
    <h1 class="text-center">New Email from {{ $name }}</h1>
    <hr>
    <ul>
        <li>Subject : {{ $EmailSubject }}</li>
        <li>Email : {{ $email }}</li>
    </ul>
    <hr>
    <p>
        {!! $EmailMessage !!}
    </p>
</div>