@extends('layouts.dashboard-template')
@section("title", "Product List")
@section('content')
    @if (session()->has('flash_notification.message'))
        <div class="row">
            <div class="col-xs-12 col-lg-12 center-align">
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <p class="bg-success">{!! session('flash_notification.message') !!}</p>
                </div>
            </div>
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-lg-offset-3 center-align">
                <div class="alert alert-danger" role="alert">
                    <ul class="collection">
                        @foreach($errors->all() as $error)
                            <li class="collection-item red-text">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-lg-12">
            <label for="type">Filter Products</label>
            <form class="form-inline" role="form">
            <div class="form-group">
                <select name="type" id="type" class="form-control" style="width: 200px;">
                    <option >Select</option>
                    <option value="pizza">Pizza</option>
                    <option value="side">Side</option>
                    <option value="drink">Drink</option>
                    <option value="dessert">Desert</option>
                </select>
                <a href="{{ route('staff.products.create') }}" class="btn btn-success">Create Product</a>
            </div>
            </form>
        </div>
    </div>
    <table id="products" class="table table-responsive">
        <thead>
        <th>ID#</th>
        <th>Title</th>
        <th>Toppings</th>
        <th>Price</th>
        <th>Code</th>
        <th>Image Path</th>
        <th>Type</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @foreach($products->chunk(1) as $productChunk)
            <tr>
                @foreach($productChunk as $product)
                    <td>{{ $product->id }}</td>
                    <th>{{ $product->title }}</th>
                    <td>{!! $product->description !!}</td>
                    <td>£{{ $product->price }}</td>
                    <td>{{ $product->code }}</td>
                    <td><img class="img-thumbnail img-responsive" style="width: 140px;"
                             src="{{ URL::to('img/products', $product->imagePath) }}"></td>
                    <td>{{ $product->type }}</td>
                    <td>
                        <form action="{{ route('staff.products.edit') }}" method="post">
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('staff.products.delete') }}" method="post">
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#type").change(function () {
            //this is the #state dom element
            var type = $(this).val();

            // parameter 1 : url
            // parameter 2: post data
            //parameter 3: callback function
            $.get('products/list/filter', {type: type}, function (htmlCode) { //htmlCode is the code retured from your controller
                $("#products tbody").html(htmlCode);
            });
        });

    </script>
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(350);
    </script>
@endsection