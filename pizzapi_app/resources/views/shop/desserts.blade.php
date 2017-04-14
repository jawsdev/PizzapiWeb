@extends("layouts.master-template")
@section("title", "| Desserts Menu")
@section('content')
    <div class="container">
        @foreach($desserts->chunk(4) as $dessertsChunk)
            <div class="row">
                @foreach($dessertsChunk as $desserts)
                    <div class="col s12 m4 l4">
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="{{ URL::to('img/products', $desserts->imagePath) }}">
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col s12 m12">
                                                <span class="card-title"><h5>{{ $desserts->title }}</h5></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m12">
                                                {!! $desserts->description !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m12">
                                                <span class="card-title">£{{ $desserts->price }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <a href="{{ route('product.addToCart', ['id' => $desserts->id]) }}"
                                                   class="waves-effect waves-light btn green"
                                                   onclick="Materialize.toast('{{ $desserts->title }} added to Basket!', 4000)"><i
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
