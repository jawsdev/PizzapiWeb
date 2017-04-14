<div class="header-logo aligner pizzapi-red">
    <div class="aligner-item--fixed">
        <a href="/"><img class="logo-image" src="{{ URL::to('/') }}/img/logo.png"></a>
    </div>
</div>
<div class="navbar">
    <nav class="grey darken-4">
        <div class="nav-wrapper">
            <div class="brand-logo center">
                <ul>
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('pages.main') }}">Home</a></li>
                    <li class="{{ Request::is('pizza') ? 'active' : '' }}"><a
                                href="{{ route('product.index') }}">Pizza</a></li>
                    <li class="{{ Request::is('sides') ? 'active' : '' }}"><a
                                href="{{ route('sides.index') }}">Sides</a></li>
                    <li class="{{ Request::is('drinks') ? 'active' : '' }}"><a
                                href="{{ route('drinks.index') }}">Drinks</a></li>
                    <li class="{{ Request::is('desserts') ? 'active' : '' }}"><a
                                href="{{ route('desserts.index') }}">Desserts</a>
                    </li>
                </ul>
            </div>

            <ul class="right">
                <li class="{{ Request::is('shopping-cart') ? 'active' : '' }} {{ Request::is('checkout') ? 'active' : '' }}">
                    <a href="{{ route('product.shoppingCart') }}">
                        <i class="material-icons left basket-icon">shopping_basket</i>
                        Basket
                        @if(Session::has('cart'))
                        <span class="badge grey darken-3 cart-badge white-text">
                        <strong>{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</strong>
                        </span>
                        @endif
                    </a>
                </li>
                <!-- Dropdown Trigger -->
                <li class="{{ Request::is('user*') ? 'active' : '' }}">
                    <a class="dropdown-button" href="{{ route('user.profile') }}" data-activates="dropdown" data-beloworigin="true"><i
                                class="material-icons left">account_box</i>My Account</a>
                </li>
                <!-- Dropdown Structure -->
                <ul id="dropdown" class="dropdown-content collection">
                    @if(Auth::check())
                        <li><a class="black-text" href="{{ route('user.profile') }}">User Profile</a></li>
                        <li class="divider"></li>
                        <li><a class="black-text" href="{{ route('user.logout') }}">Logout</a></li>
                    @else
                        <li><a class="black-text" href="{{ route('user.signin') }}">Signin</a></li>
                        <li class="divider"></li>
                        <li><a class="black-text" href="{{ route('user.signup') }}">Signup</a></li>
                    @endif
                </ul>

            </ul>
        </div>
    </nav>
</div>
