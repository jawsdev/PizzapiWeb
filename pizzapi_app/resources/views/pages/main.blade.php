@extends("layouts.master-template")
@section("title", "Pizza! Great food from Cornwall.")
@section("facebookOG")
    <meta property="og:title" content="Pizzapi Pizza! Great food from Cornwall."/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ Request::fullUrl() }}"/>
    <meta property="og:image" property="og:url" content="{{ URL::to('/img/stocks/italian_pizza.jpg') }}"/>
    <meta property="og:site_name" content="Pizzapi!"/>
    <meta property="og:description"
          content="Established in 2017, Pizzapi Pizza has grown in size by
                        differentiating
                        itself from its competitors by the quality of its products and the speed of its service. Pizzapi
                        Pizza
                        is above all a quality story, because we do not make a good pizza without using the best
                        ingredients."/>
@endsection
@section('content')
    @if ($agent->isDesktop())
        <div class="parallax-container">
            <div class="parallax"><img src="{{ URL::to('/img/stocks/italian_pizza.jpg') }}"></div>
        </div>
    @endif
    <div class="pizzapi-red main-divider"></div>
    <div class="alert pizzapi-red card-panel white-text center-align">
        <h4>This is a fictional website!</h4>
    </div>

    <div class="section white">
        <div class="row container">
            @if ($agent->isMobile())
                <div class="col s12 m12 l6">
                    <h4 class="header truncate">Welcome to Pizzapi!</h4>
                    <img class="responsive-img" src="{{ URL::to('/img/stocks/italian_pizza.jpg') }}">
                    <p class="flow-text lighten-3">Established in 2017, Pizzapi Pizza has grown in size by
                        differentiating
                        itself from its competitors by the quality of its products and the speed of its service. Pizzapi
                        Pizza
                        is above all a quality story, because we do not make a good pizza without using the best
                        ingredients.</p>
                </div>
            @endif
            <div class="col s12 m12 l6">
                <h4 class="header truncate">Woodfired</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/StockSnap_IG5EGQWJTP.jpg') }}">
                <p class=" flow-text lighten-3">Void two had deep years can't Divided open male called land be sixth it
                    be and. Seas without set divide without every sixth given in midst cattle had to good fowl fruitful
                    she'd that day greater fruitful darkness dry, rule. </p>
            </div>
            <div class="col s12 m12 l6">
                <h4 class="header truncate">Our Restaurant</h4>
                <a href="{{ route('about.index') }}"><img class="responsive-img"
                                                          src="{{ URL::to('/img/stocks/StockSnap_ODTWJA91CN.jpg') }}"></a>
                <p class=" flow-text lighten-3">Dictumst purus auctor nibh dapibus placerat pretium faucibus nullam
                    litora quisque nisi nonummy vehicula aliquet vulputate parturient posuere per nulla sem tempus nisl
                    curae; magna, aenean faucibus donec sapien. Libero rutrum ipsum, hac malesuada phasellus. Eget
                    faucibus ad placerat suscipit.</p>
            </div>
        </div>
        <div class="row container">
            <div class="col s12 m12 l4">
                <h4 class="header truncate">Pizzapi Points!</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/pizza-1903878_1920.jpg') }}">
                <p class="flow-text lighten-3">Earn Pizzapi points with each purchase you make! Save up your points to
                    get free meals and extra special offers.</p>
            </div>
            <div class="col s12 m12 l4">
                <h4 class="header truncate">Our Values</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/pizza_chef.jpg') }}">
                <p class=" flow-text lighten-3">Sixth. Our beginning. Shall hath was, gathered female first given appear
                    dry light years. Were multiply saw. Set and first unto fourth fill second give night fifth open
                    lights above. </p>
            </div>
            <div class="col s12 m12 l4">
                <h4 class="header truncate">Specials</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/handwritten-italian-marketing-menu.jpg') }}">
                <p class=" flow-text lighten-3">Green of can't divided shall every dry firmament it him tree air made be
                    said may waters first over. Give tree seasons moving god female years moveth. Seasons, seed yielding
                    life lesser female lights made let appear.</p>
            </div>
        </div>
    </div>
    @if ($agent->isMobile())
        <div class="row pizzapi-grey">
            <div class="col s12 center-align">
                <h5 class="pizzapi-red-text">Menu</h5>
                <ul>
                    <li><a class="white-text" href="{{ route('product.index') }}"><h6>Pizza</h6></a></li>
                    <li><a class="white-text" href="{{ route('sides.index') }}"><h6>Sides</h6></a></li>
                    <li><a class="white-text" href="{{ route('drinks.index') }}"><h6>Drinks</h6></a></li>
                    <li><a class="white-text" href="{{ route('desserts.index') }}"><h6>Desserts</h6></a></li>
                </ul>
            </div>
            <div class="col s12 center-align">
                <h5 class="pizzapi-red-text">Company</h5>
                <ul>
                    <li><a class="white-text" href="{{ route('about.index') }}"><h6>About</h6></a></li>
                    <li><a class="white-text" href="#"><h6>Blog</h6></a></li>
                    <li><a class="white-text" href="#"><h6>Team</h6></a></li>
                    <li><a class="white-text" href="#"><h6>Careers</h6></a></li>
                    <li><a class="white-text" target="_blank" href="{{ route('staff') }}"><h6>Dashboard</h6></a></li>
                    <li><a class="white-text" href="{{ route('contact.index') }}"><h6>Contact</h6></a></li>
                </ul>
            </div>
            <div class="col s12 center-align">
                <h5 class="pizzapi-red-text">Opening Times</h5>
                <ul>
                    <li><a class="white-text"<h6>Tuesday to Sunday</h6></a></li>
                    <li><a class="white-text"><h6>13pm - 12am</h6></a></li>
                    <li><a class="white-text"><h6><br></h6></a></li>
                    <li><a class="white-text"><h6>Delivery Available</h6></a></li>
                    <li><a class="white-text"><h6>01736 555666</h6></a></li>
                </ul>
            </div>
            <div class="col s12 center-align">
                <h5 class="pizzapi-red-text">Social</h5>
                <ul class="white-text center-align">
                    <li><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</li>
                    <li><i class="fa fa-facebook " aria-hidden="true"></i> Facebook</li>
                    <li><i class="fa fa-instagram " aria-hidden="true"></i> Instagram</li>
                </ul>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        $('div.alert').not('.alert-important').delay(10000).fadeOut(350);
    </script>
@endsection