@extends("layouts.master-template")
@section("title", "| Pizza! Great food from Cornwall!")
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col s12 l4 offset-l4">
                <h2>Checkout</h2>
                <h4>Your Total: £{{ $total }}</h4>
                <div id="charge-error" class="card-panel {{ !Session::has('error') ? 'hidden' : '' }}">
                    @if(count($errors) > 0)
                        <ul class="collection">
                            @foreach($errors->all() as $error)
                                <li class="collection-item red-text">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {{ Session::get('error') }}
                </div>
                <div class="row">
                    <form action="{{ route('checkout') }}" class="col s12" method="post" id="checkout-form">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" name="first_name" value="{{ $user_info->first_name }}" type="text" class="validate" required=""
                                       aria-required="true">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" name="last_name" value="{{ $user_info->last_name }}" type="text" class="validate" required=""
                                       aria-required="true">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Address Switch -->
                            <div class="input-field col s12">
                                <select name="service" id="service" required="" class="validate" aria-required="true">
                                    <option value="" disabled selected>Choose your service method</option>
                                    <option name="pickup" value="pickup">Pickup</option>
                                    <option name="delivery" value="delivery">Delivery</option>
                                </select>
                                <label for="service">Pickup/Delivery</label>
                            </div>
                        </div>
                        <div id="delivery_info_div" class="row">
                            <div class="input-field col s12">
                                <input id="delivery_info" name="delivery_info" type="text" class="validate">
                                <label for="delivery_info">Message to our driver</label>
                            </div>
                        </div>
                        <div id="address_div" class="row">
                            <div class="input-field col s12">
                                <input id="address" value="{{ $user_info->address }}" name="address" type="text" class="validate" required=""
                                       aria-required="true">
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="row no_bottom_margin" id="postcode_div">
                            <h5>Or Find New</h5>
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
                                <input id="phone_number" value="{{ $user_info->phone_number }}" name="phone_number" type="number" class="validate" required=""
                                       aria-required="true">
                                <label for="phone_number">Phone Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="card-name" name="payment_name" value="{{ $user_info->first_name }} {{ $user_info->last_name }}" type="text" class="validate" required="" aria-required="true">
                                <label for="card-name">Card Holder Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="card-number" type="number" class="validate" required="" aria-required="true">
                                <label for="card-number">Credit Card Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="card-expiry-month" type="number" class="validate" maxlength="2" required=""
                                       aria-required="true">
                                <label for="card-expiry-month">Card Expiry Month</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="card-expiry-year" type="number" maxlength="4" class="validate" required=""
                                       aria-required="true">
                                <label for="card-expiry-year">Card Expiry Year</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="card-cvc" type="number" class="validate" required="" maxlength="3" aria-required="true">
                                <label for="card-cvc">CVC Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <input type="hidden" name="email" value="{{ $user_info->email }}">
                                {{ csrf_field() }}
                                <button type="submit" name="action" class="btn waves-effect waves-light green left"><i class="material-icons right">https</i>Buy now</button>
                                <a href="#https_info"><i class="material-icons left small green-text">info</i></a>
                                <!-- Modal Structure -->
                                <div id="https_info" class="modal">
                                    <div class="modal-content">
                                        <h4>Pizzapi Security</h4>
                                        <p>Pizzapi uses SHA256RSA(TLS 1.2) Encryption</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green green white-text btn-flat">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <h4>Student Notes</h4>
                            <p class="flow-text">Please use the following test credit card details for processing payments through the checkout</p>
                            <h5>Card Number: 4242424242424242</h5>
                            <h6>Card Expiry Month: 12</h6>
                            <h6>Card Expiry Year: 2019</h6>
                            <h6>Card CNC: 333</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#address_div').hide();
            $('#service').change(function(){
                if($('#service').val() == 'delivery') {
                    $('#address_div').show();
                } else {
                    $('#address_div').hide();
                }
            });
            $('#delivery_info_div').hide();
            $('#service').change(function(){
                if($('#service').val() == 'delivery') {
                    $('#delivery_info_div').show();
                } else {
                    $('#delivery_info_div').hide();
                }
            });

            $('#postcode_div').hide();
            $('#service').change(function(){
                if($('#service').val() == 'delivery') {
                    $('#postcode_div').show();
                } else {
                    $('#postcode_div').hide();
                }
            });
        });

        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });

    </script>
    <script type="text/javascript">
        //PHP Version - http://ben-major.co.uk/2012/02/using-google-maps-to-lookup-uk-postcodes

        $('#submit').click(function () {

            //Get Postcode
            var number = $('#number').val();
            var postcode = $('#postcode').val().toUpperCase();
            ;

            //Get latitude & longitude
            $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=' + postcode + '&sensor=false',
                function (data) {
                    var lat = data.results[0].geometry.location.lat;
                    var lng = data.results[0].geometry.location.lng;

                    //Get address
                    $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng + '&sensor=false',
                        function (data) {
                            var address = data.results[0].address_components;
                            var street = address[1].long_name;
                            var town = address[2].long_name;
                            var county = address[3].long_name;

                            //Insert
                            $('#address').val(number + ', ' + street + ', ' + town + ', ' + county + ', ' + postcode);

                            jQuery('#address').on('input', function () {
                                document.getElementById("address").blur();
                            });
                        });
                });


            $(document).ready(function() {
                Materialize.updateTextFields();
            });
        });
    </script>
@endsection