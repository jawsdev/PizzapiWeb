<div class="row no_bottom_margin pizzapi-red">
    <div class="col s4">

    </div>
    <div class="col s4">
        <div class="header-logo aligner">
            <div class="aligner-item--fixed"><a href="{{ route('pages.main') }}"><img class="logo-image fadeIn" src="{{ URL::to('/') }}/img/logo.png"></a></div>
        </div>
    </div>
    <div class="col s4">
        <div class="valign-wrapper">
            <a href="{{ route('product.shoppingCart') }}">
            <h5 class="right"><i class="material-icons small white-text">shopping_basket</i></h5></a>
            @if(Session::has('cart'))
                <span class="badge grey darken-3 cart-badge white-text">
                    <strong>{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</strong>
                </span>
            @endif

        </div>
    </div>
</div>

<div id="myNav" class="overlay" style="height: 0%;">
    <div class="overlay-content">
        <div class="row">
            <div class="col s5">
                @if(Auth::check())
                    <h6 class="s_nav_name">{{ $user_info['first_name'] }} {{ $user_info['last_name'] }}</h6>
                    <h6 class="s_nav_email">{{ $user_info['email'] }}</h6>
                    <a href="{{ route('user.logout') }}"><h6 class="s_nav_email">Logout</h6></a>
                @else
                    <a class="small" href="{{ route('user.signup') }}">Signup</a><br />
                    <a href="{{ route('user.signin') }}">Login</a>
                @endif
            </div>
            <div class="col s1">
            </div>
            <div class="col s6">
                <div class="row">
                    <div class="col s9">
                        <span class="pull-right">
                        <a href="{{ route('product.shoppingCart') }}"><i class="material-icons small s_nav_basket">shopping_basket</i></a>
                            </span>
                    </div>
                    <div class="col s3">
                        @if(Session::has('cart'))
                            <a href="{{ route('product.shoppingCart') }}"><h6 style="font-size: 1.2rem;" class="valign">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</h6></a>
                        @else
                            <div class="valign-wrapper pull-right">
                                <h6 class="valign">0 Items</h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row no_bottom_margin">
            <div class="col s12">
                <a href="{{ route('pages.main') }}"><h4>Home</h4></a>
            </div>
        </div>
        <div class="row no_bottom_margin">
            <div class="col s12">
                <a href="{{ route('product.index') }}"><h4>Pizza</h4></a>
            </div>
        </div>
        <div class="row no_bottom_margin">
            <div class="col s12">
                <a href="{{ route('sides.index') }}"><h4>Sides</h4></a>
            </div>
        </div>
        <div class="row no_bottom_margin">
            <div class="col s12">
                <a href="{{ route('drinks.index') }}"><h4>Drinks</h4></a>
            </div>
        </div>
        <div class="row no_bottom_margin">
            <div class="col s12">
                <a href="{{ route('desserts.index') }}"><h4>Desserts</h4></a>
            </div>
        </div>
    </div>
</div>