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
        <a href="{{ route('product.index') }}"><div class="parallax-container">
            <div class="parallax">
                <img src="{{ URL::to('/img/stocks/italian_pizza.jpg') }}"></div>
        </div>
        </a>
    @endif
    <div class="pizzapi-red main-divider z-depth-1"></div>
    @if(!Auth::check())
    <div class="container">
        <div class="row">
            <div class="col s12 center-align">
                <a class="waves-effect waves-light btn-large white-text pizzapi-red main-buttons" href="{{ route('user.signup') }}">Register</a>
                <a class="waves-effect waves-light btn-large white-text pizzapi-red main-buttons" href="{{ route('user.signin') }}">Login</a>
            </div>
        </div>
    </div>
    @endif
    <div class="section white">
        <div class="row container">
            @if ($agent->isMobile())
                <div class="col s12 m12 l6">
                    <h4 class="header truncate">Welcome to Pizzapi!</h4>
                    <img class="responsive-img" src="{{ URL::to('/img/stocks/italian_pizza.jpg') }}">
                    <p class="flow-text lighten-3">Duis imperdiet vestibulum libero sit accumsan venenatis fames ligula
                        interdum ad accumsan, mattis pellentesque. Ad. Pharetra parturient. At nisl class donec per
                        fermentum nam quam vitae nascetur, mi montes mus feugiat fusce hendrerit ultricies luctus
                        dapibus nam id praesent ad. Fusce cum. Nostra arcu tristique metus sapien sociis vehicula
                        conubia.</p>
                </div>
            @endif
            <div class="col s12 m12 l6">
                <h4 class="header truncate">Woodfired</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/StockSnap_IG5EGQWJTP.jpg') }}">
                <p class=" flow-text lighten-3">Odio malesuada venenatis blandit. Posuere scelerisque fringilla nec
                    massa id dictumst aenean magna nonummy amet lacus nibh accumsan lacus sed eros, ridiculus praesent
                    dignissim justo nascetur sociis quisque nulla, purus cursus sollicitudin, aptent massa suspendisse
                    gravida nam hendrerit per. Hendrerit dignissim dapibus montes facilisis. Imperdiet pellentesque
                    lacinia, felis ante volutpat. </p>
            </div>
            <div class="col s12 m12 l6">
                <h4 class="header truncate">Our Restaurant</h4>
                <a href="{{ route('about.index') }}"><img class="responsive-img"
                                                          src="{{ URL::to('/img/stocks/StockSnap_ODTWJA91CN.jpg') }}"></a>
                <p class=" flow-text lighten-3">Felis Quisque auctor eros velit mi integer Ullamcorper. Ligula praesent
                    convallis imperdiet non viverra convallis conubia mattis per bibendum eu nisi quis vivamus consequat
                    praesent venenatis et proin. Mattis metus felis ullamcorper curae; dictum turpis fames est blandit
                    ullamcorper nam lobortis enim non. Aliquam mauris vulputate sit proin dictum lacus.</p>
            </div>
        </div>
        <div class="row container">
            <div class="col s12 m12 l4">
                <h4 class="header truncate">Pizzapi Points!</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/pizza-1903878_1920.jpg') }}">
                <p class="flow-text lighten-3">Ornare nam hymenaeos Mollis ac fringilla maecenas ultrices eget.
                    Scelerisque lacinia porta scelerisque, porttitor turpis blandit eleifend natoque. Per adipiscing
                    erat. Pretium Leo nisi dignissim vulputate conubia potenti nam lacinia nunc. Nascetur nibh dignissim
                    per hendrerit sem sapien neque porttitor vitae inceptos mauris interdum. Class malesuada convallis
                    posuere fusce vitae.</p>
            </div>
            <div class="col s12 m12 l4">
                <h4 class="header truncate">Our Values</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/chefs-1661129_640.jpg') }}">
                <p class=" flow-text lighten-3">Imperdiet erat venenatis, urna conubia placerat varius aliquam nam
                    hendrerit, iaculis consequat tellus parturient praesent. Natoque aptent mollis euismod amet sit nisl
                    cras porta habitant arcu ad, ipsum nostra urna. Lacus sed imperdiet habitasse orci eget egestas
                    aptent, eu ultricies dui nam purus fusce mauris. Pellentesque ultricies porta imperdiet hac.</p>
            </div>
            <div class="col s12 m12 l4">
                <h4 class="header truncate">Specials</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/handwritten-italian-marketing-menu.jpg') }}">
                <p class=" flow-text lighten-3">Ornare at parturient rutrum erat morbi malesuada vehicula vel. Eget cum.
                    Hymenaeos vestibulum at odio risus magna laoreet purus at eget natoque at. Dis habitasse habitant
                    sodales auctor blandit cubilia adipiscing Hac felis eleifend rutrum bibendum. Fames nisl parturient
                    Molestie eget molestie cursus faucibus class pulvinar. Pellentesque suspendisse cras malesuada.</p>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('div.alert').not('.alert-important').delay(8000).fadeOut(350);
    </script>
@endsection
