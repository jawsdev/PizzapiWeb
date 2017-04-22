@extends("layouts.master-template")
@section("title", "Pizzs Menu")
@section('content')
    <div class="container">
        @foreach($pizzas->chunk(3) as $pizzaChunk)
            <div class="row">
                @foreach($pizzaChunk as $pizza)
                    <div class="col s12 m4 l4">
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="card">
                                    <div class="card-image" style="height: 250px; overflow: hidden;">
                                        <img src="{{ URL::to('img/products', $pizza->imagePath) }}">
                                    </div>
                                    <div class="card-content">
                                        <div class="row no_bottom_margin">
                                            <div class="col s12 m12">
                                                <span class="card-title"><h5>{{ $pizza->title }}</h5></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m12" style="height: 60px;">
                                                {!! $pizza->description !!}
                                            </div>
                                        </div>
                                        <div class="row no_bottom_margin">
                                            <div class="col s12 m12">
                                                <span class="card-title">£{{ $pizza->price }}</span>
                                            </div>
                                        </div>
                                        <div class="row no_bottom_margin">
                                            <div class="col s12">
                                                <a href="{{ route('product.addToCart', ['id' => $pizza->id]) }}"
                                                   class="waves-effect waves-light btn green"
                                                   onclick="Materialize.toast('{{ $pizza->title }} added to Basket!', 4000)"><i
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
            <div class="row">
                <div class="col s12 center-align">
                    @include('partials.pagination', ['paginator' => $pizzas])
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')

@endsection

