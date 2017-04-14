@if (Session::has('success'))
    <h3>{{ Session::get('success') }}</h3>
@endif

@if (count($errors) > 0)
    <stong>Errors:</stong>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
