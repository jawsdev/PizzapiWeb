@extends("layouts.master-template")
@section("title", "| Pizzs Menu")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 center-align"><h5 class="error-text-large">Unauthorized</h5><h6 class="error-text-small">Error 401</h6></div>
            <div class="col s12 center-align">Sorry this is a staff only page</div>
            <div class="col s12 center-align"><a href="{{ route('user.signin') }}"><h4>Sign in</h4></a></div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection

