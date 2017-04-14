@extends("layouts.master-template")
@section("title", "My Basket")
@section('content')
    @if(Session::has('cart'))
        <div class="container main-wrap">
            <div class="row">
                <div class="col s12 l6 offset-l3 z-depth-1">
                    <h4>My Order</h4>
                    @foreach($products as $product)
                        <div class="divider"></div>
                        <div class="section">
                            <div class="row no_bottom_margin">
                                <div class="col s2">
                                    <div class="chip pull-left">{{ $product['qty'] }}x</div>
                                </div>
                                <div class="col s6">
                                    <h5>{{ $product['item'] ['title'] }}</h5>
                                </div>
                                <div class="col s2">
                                    <h5>£{{ $product ['price']}}</h5>
                                </div>
                                <div class="col s2">
                                    <a href="{{ route('product.increaseByOne', ['id' => $product['item']['id']]) }}" onclick="Materialize.toast('1 {{ $product['item'] ['title'] }} Added', 4000)"><i
                                                class="material-icons green-text">add</i></a>
                                    <a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}" onclick="Materialize.toast('1 {{ $product['item'] ['title'] }} Removed', 4000)"><i
                                                class="material-icons red-text">remove</i></a>
                                    <a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}" onclick="Materialize.toast('{{ $product['item'] ['title'] }} removed from basket!', 4000)"><i
                                                class="material-icons black-text">delete</i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col s12 l6 offset-l3">
                    <h5>Total: £{{ $totalPrice }}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l6 offset-l3">
                    <a href="{{ route('checkout') }}" class="btn waves-effect waves-light grey darken-4" type="submit"
                       name="action">Checkout
                        <i class="material-icons right">payment</i>
                    </a>
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col s12 l6 offset-l3">
                        <h3 class="center-align">Nothing in the basket!</h3>
                    </div>
                </div>
            @endif
        </div>
@endsection