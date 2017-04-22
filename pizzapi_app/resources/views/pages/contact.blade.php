@extends("layouts.master-template")
@section("title", "Contact us")
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
            <div class="col s12 m12 l6 offset-l3">
                <h4 class="header truncate">Contact us</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate">
                        <label for="email">Your email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Message</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Send
                    <i class="material-icons right">send</i>
                </button>
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