@extends("layouts.master-template")
@section("title", "| Pizza! Great food from Cornwall!")
@section("facebookOG")
    <meta property="og:title" content="Pizzapi Pizza! Contact"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ Request::fullUrl() }}"/>
    <meta property="og:image" content="{{ URL::to('/img/stocks/StockSnap_DJ6E3EDHY7.jpg') }}"/>
    <meta property="og:site_name" content="Pizzapi!"/>
    <meta property="og:description"
          content="Beginning midst divide seed fish doesn't morning said bearing blessed a together. Every saw shall fruitful, morning years likeness creepeth days first fifth beast one third to of male Whales. Day can't above fish give moved there them living moved gathering heaven creepeth you'll land female winged saying creepeth over."/>
@endsection
@section('content')
    @if ($agent->isDesktop())
        <div class="parallax-container">
            <div class="parallax"><img src="{{ URL::to('/img/stocks/StockSnap_DJ6E3EDHY7.jpg') }}"></div>
        </div>
    @endif
    <div class="pizzapi-red main-divider"></div>
    <div class="section white">
        <div class="row container">
            <div class="col s12 m12 l6">
                <h4 class="header truncate">Pizzapi Points!</h4>
                <img class="responsive-img" src="{{ URL::to('/img/stocks/StockSnap_QI10VZZPBC.jpg') }}">
                <p class="flow-text lighten-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Beatae blanditiis consequuntur dicta dolor ducimus eius, eum facilis neque nesciunt pariatur
                    praesentium qui quisquam quos rerum tenetur totam voluptatibus? Ad, corporis?</p>
            </div>
            <div class="col s12 m12 l6">
                <h4 class="header truncate">Our Restaurant</h4>
                <a href="{{ route('about.index') }}"><img class="responsive-img" src="{{ URL::to('/img/stocks/StockSnap_ODTWJA91CN.jpg') }}"></a>
                <p class=" flow-text lighten-3">Established in 1995, Mambo Pizza has grown in size by differentiating itself from its competitors by the quality of its products and the speed of its service. Mambo Pizza is above all a quality story, because we do not make a good pizza without using the best ingredients.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <iframe
                    width="100%"
                    height="450"
                    marginwidth="0"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyABxzyte1o35kK0yRGBdLzisZYsmEa_GF4
    &q=Penzance" allowfullscreen>
            </iframe>
        </div>
    </div>
@endsection
@section('scripts')
@endsection