@extends('layouts.dashboard-template')
@section("title", "Edit Product")
@section('content')
    @if (session()->has('flash_notification.message'))
        <div class="row">
            <div class="col-xs-12 col-lg-12 center-align">
                <div class=" alert alert-{{ session('flash_notification.level') }}">
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
        <div class="col-xs-3">
            <h3>Preview</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="thumbnail">
                        <img src="{{ URL::to('img/products', $product->imagePath) }}" alt="{{ $product->title }}">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            {!! $product->description !!}
                            <h3><strong>£ {{ $product->price }}</strong></h3>
                            <p><a href="#" class="btn btn-success text-uppercase" role="button">Add to Order</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-8">
            <div class="row">
                <div class="col-xs-12 col-lg-8">
                    <h3>Edit</h3>
                    <form action="{{ route('staff.products.edit.product') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" value="{{ $product->title }}" class="form-control" name="title"
                                   id="title"
                                   placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <span class="input-group-addon">£</span>
                                <input type="number" value="{{ $product->price }}" name="price" id="price"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Toppings</label>
                            <textarea id="description" name="description" class="form-control"
                                      rows="5">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Type of Product</label>
                            <select name="type" id="type" class="form-control">
                                <option
                                        @if($product->type == 'pizza')
                                        selected="selected"
                                        @else

                                        @endif
                                        value="pizza">Pizza
                                </option>
                                <option value="side">Side</option>
                                <option value="drink">Drink</option>
                                <option value="dessert">Dessert</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="code">Name</label>
                            <input type="text" value="{{ $product->code }}" class="form-control" name="code" id="code"
                                   placeholder="Code#">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" name="product_image" id="product_image">
                        </div>
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <input type="hidden" value="{{ $product->imagePath }}" name="stored_imagePath">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::to('src/assets/tinymce/tinymce.min.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute: "{{ URL::to('/') }}/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.9,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endsection