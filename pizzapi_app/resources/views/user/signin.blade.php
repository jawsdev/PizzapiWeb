@extends("layouts.master-template")
@section("title", "Sign in")
@section('content')
    <div class="row">
        <div class="col s12 m12 l4 offset-l4">
            <h3 class="flow-text">Login to Pizzapi!</h3>
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{ route('user.signin') }}" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input tabindex="1" id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row no_bottom_margin">
                    <div class="input-field col s12">
                        <input tabindex="2" id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row no_bottom_margin">
                    <div class="input-field col s12">
                        <button tabindex="3" class="waves-effect waves-light btn red" type="submit">Sign In</button>
                        {{ csrf_field() }}
                    </div>
                </div>
            </form>
            <p>Don't have an account? <a href="{{ route('user.signup') }}">Sign up!</a></p>
        </div>
    </div>
@endsection