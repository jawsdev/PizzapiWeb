@extends("layouts.master-template")
@section("title", "| Register")
@section('content')
    <div class="row">
        <div class="col s12 m12 l4 offset-l4">
            <div class="row no_bottom_margin">
                <div class="col s12">
                    <h4>Register with Pizzapi!</h4>
                </div>
            </div>
            <div class="row no_bottom_margin">
                <div class="col s12">
                    @if(count($errors) > 0)
                        <ul class="collection">
                            @foreach($errors->all() as $error)
                                <li class="collection-item red-text">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <form action="{{ route('user.signup') }}" method="post">
                <div class="row no_bottom_margin">
                    <div class="input-field col s6 no_bottom_margin">
                        <input id="first_name" name="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6 no_bottom_margin">
                        <input id="last_name" name="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row no_bottom_margin">
                    <div class="input-field col s4">
                        <input id="number" onfocus="if(this.value == 'name/number') { this.value = ''; }" value=""
                               type="text" class="validate">
                        <label for="number">Name/Number</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="postcode" onfocus="if(this.value == 'postcode') { this.value = ''; }" type="text"
                               class="validate">
                        <label for="postcode">Postcode</label>
                    </div>
                    <div class="input-field col s4">
                        <a class="waves-effect waves-light btn green" id="submit">Find</a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="address" name="address" type="text" class="validate">
                        <label class="active" for="address">Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="phone_number" name="phone_number" type="number" class="validate">
                        <label for="phone_number">Phone Number</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="waves-effect waves-light btn red" type="submit">Register</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::to('/src/js/postcode.js') }}"></script>
@endsection