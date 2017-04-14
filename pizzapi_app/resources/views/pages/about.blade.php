@extends("layouts.master-template")
@section("title", "| Pizza! Great food from Cornwall!")
@section("facebookOG")
    <meta property="og:title" content="Pizzapi Pizza! About"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ Request::fullUrl() }}"/>
    <meta property="og:image" content="{{ URL::to('/img/stocks/matthieu-joannon-172774.jpg') }}"/>
    <meta property="og:site_name" content="Pizzapi!"/>
    <meta property="og:description"
          content="Beginning midst divide seed fish doesn't morning said bearing blessed a together. Every saw shall fruitful, morning years likeness creepeth days first fifth beast one third to of male Whales. Day can't above fish give moved there them living moved gathering heaven creepeth you'll land female winged saying creepeth over."/>
@endsection
@section('content')
    <div class="parallax-container">
        <div class="parallax"><img src="{{ URL::to('/img/stocks/matthieu-joannon-172774.jpg') }}"></div>
    </div>
    <div class="section white">
        <div class="row container">
            <div class="col s12 m12 l6">
                <h2 class="header truncate">History</h2>
                <p class="grey-text flow-text lighten-3">Moved morning. Fifth dominion yielding were. Place seasons
                    greater were fill don't winged. Subdue. Us fruitful appear years give said winged image rule moved
                    life. Firmament forth given likeness whales. Seed every the Seas fruitful shall set let for day air
                    likeness. Won't divided made Which let thing morning one.</p>
            </div>
            <div class="col s12 m12 l6">
                <h2 class="header truncate">What is Pizzapi?</h2>
                <p class="grey-text flow-text lighten-3">This website was made for my honours project part of the BSc
                    Computing Technoologies degree at Cornwall College, it is not a real Pizza business.</p>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection