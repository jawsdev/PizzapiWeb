@extends("layouts.master-template")
@section("title", "| Sides Menu")
@section('content')
    <div class="container">
        @foreach($sides->chunk(3) as $sidesChunk)
            <div class="row">
                @foreach($sidesChunk as $sides)
                    <div class="col s12 m4 l4">
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="{{ URL::to('img/products', $sides->imagePath) }}">
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col s12 m12">
                                                <span class="card-title"><h5>{{ $sides->title }}</h5></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m12">
                                                <p>{{ $sides->description }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m12">
                                                <span class="card-title">£{{ $sides->price }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <a href="{{ route('product.addToCart', ['id' => $sides->id]) }}" class="waves-effect waves-light btn green" onclick="Materialize.toast('{{ $sides->title }} added to Basket!', 4000)"><i class="material-icons left">shopping_basket</i>Add to Order</a>
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
