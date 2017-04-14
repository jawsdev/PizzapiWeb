@extends("layouts.master-template")
@section("title", "| Drinks Menu")
@section('content')
    <div class="container">
        @foreach($drinks->chunk(5) as $drinksChunk)
            <div class="row">
                @foreach($drinksChunk as $drinks)
                    <div class="col s12 m4 l4">
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="{{ URL::to('img/products', $drinks->imagePath) }}">
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col s12 m12">
                                                <span class="card-title"><h5>{{ $drinks->title }}</h5></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m12">
                                                {!! $drinks->description !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m12">
                                                <span class="card-title">£{{ $drinks->price }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <a href="{{ route('product.addToCart', ['id' => $drinks->id]) }}"
                                                   class="waves-effect waves-light btn green"
                                                   onclick="Materialize.toast('{{ $drinks->title }} added to Basket!', 4000)"><i
                                                            class="material-icons left">shopping_basket</i>Add to Order</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
