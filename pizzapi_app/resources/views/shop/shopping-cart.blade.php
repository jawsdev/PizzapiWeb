@extends("layouts.master-template")
@section("title", "My Basket")
@section('content')
    @if(Session::has('cart'))
        <div class="row grey darken-2">
            <div class="col s12 l6 offset-l3">
                <nav class="z-depth-0">
                    <div class="nav-wrapper  grey darken-2">
                        <div class="col s12">
                            <a href="{{ route('product.shoppingCart') }}" class="breadcrumb">Basket</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        @if ($agent->isMobile())
            <div class="row">
                <div class="col s12"><h5>Subtotal ({{ $totalQty }} items): £{{ $totalPrice }}</h5></div>
            </div>
            <div class="divider"></div>
            <br/>
            @foreach($products as $product)
                <div class="row">
                    <div class="col s2">
                        <img class="circle responsive-img"
                             src="{{ URL::to('img/products') }}/{{ $product['item'] ['imagePath'] }}">
                    </div>
                    <div class="col s10">
                        <div class="row">
                            <div class="col s9">
                                <h5>{{ $product['item'] ['title'] }}</h5>
                                <h6>{!! $product['item'] ['description'] !!}</h6>
                            </div>
                            <div class="col s3">
                                <h5>£{{ $product ['price']}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6 right-align">
                                <a class="waves-effect waves-light btn red darken-3"
                                   href="{{ route('product.remove', ['id' => $product['item']['id']]) }}"
                                   onclick="Materialize.toast('{{ $product['item'] ['title'] }} removed from basket!', 4000)">REMOVE</a>
                            </div>
                            <div class="col s6">
                                <table cellpadding="0">
                                    <tr>
                                        <td class="center-align grey" style="line-height: 2px;">
                                            <a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}"
                                               onclick="Materialize.toast('1 {{ $product['item'] ['title'] }} Removed', 4000)"><i
                                                        class="material-icons white-text">remove</i>
                                            </a>
                                        </td>
                                        <td class="center-align grey lighten-2" style="width: 30px;">
                                            <span style="font-size: 24px; margin-left: 10px; margin-right: 10px; font-weight: bold;">{{ $product['qty'] }}</span>
                                        </td>
                                        <td class="center-align grey darken-3" style="line-height: 2px;">
                                            <a href="{{ route('product.increaseByOne', ['id' => $product['item']['id']]) }}"
                                               onclick="Materialize.toast('1 {{ $product['item'] ['title'] }} Added', 4000)"><i
                                                        class="material-icons white-text">add</i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row right-align">
                <div class="col s12 l6 offset-l3">
                    <a href="{{ route('checkout') }}" class="btn waves-effect waves-light btn-large green accent-3 black-text"
                       type="submit"
                       name="action">Checkout
                        <i class="material-icons right">payment</i>
                    </a>
                </div>
            </div>
        @endif
        @if ($agent->isDesktop())
            <div class="container">
                <div class="row">
                    <div class="col l8 offset-l2">
                        <h4>My Order</h4>
                        <table>
                            <thead>
                            <tr class="grey lighten-3">
                                <th width="26"></th>
                                <th width="50"></th>
                                <th class="left-align">Product</th>
                                <th width="20">Quantity</th>
                                <th width="30">Price</th>
                                <th width="30">Subtotal</th>
                                <th width="26"></th>
                                <th width="26"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}"
                                           onclick="Materialize.toast('{{ $product['item'] ['title'] }} removed from basket!', 4000)"><i
                                                    class="material-icons black-text">delete</i></a></td>
                                    <td><img class="circle responsive-img"
                                             src="{{ URL::to('img/products') }}/{{ $product['item'] ['imagePath'] }}">
                                    </td>
                                    <td><h5>{{ $product['item'] ['title'] }}</h5>
                                        <h6>{!! $product['item'] ['description'] !!}</h6></td>
                                    <td>
                                        <div class="chip pull-left">{{ $product['qty'] }}</div>
                                    </td>
                                    <td><h5>£{{ $product ['price']}}</h5></td>
                                    <td><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}"
                                           onclick="Materialize.toast('1 {{ $product['item'] ['title'] }} Removed', 4000)"><i
                                                    class="material-icons red-text">remove</i></a></td>
                                    <td><a href="{{ route('product.increaseByOne', ['id' => $product['item']['id']]) }}"
                                           onclick="Materialize.toast('1 {{ $product['item'] ['title'] }} Added', 4000)"><i
                                                    class="material-icons green-text">add</i></a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="right-align"><h4>Total:</h4></td>
                                <td colspan="2" class="right-align"><h4>£{{ $totalPrice }}</h4></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="4" class="right-align">
                                    <a href="{{ route('checkout') }}"
                                       class="btn waves-effect waves-light btn-large green accent-3"
                                       type="submit"
                                       name="action">Checkout
                                        <i class="material-icons right">payment</i>
                                    </a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        @else
            <div class="row">
                <div class="col s12 l6 offset-l3">
                    <h3 class="center-align">Nothing in the basket!</h3>
                </div>
            </div>

    @endif
@endsection