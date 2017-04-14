@foreach($products->chunk(1) as $productChunk)
    <tr>
@foreach($productChunk as $product)

        <td>{{ $product->id }}</td>
        <th>{{ $product->title }}</th>
        <td>{!! $product->description !!}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->code }}</td>
        <td><img class="img-thumbnail img-responsive" style="width: 140px;"
                 src="{{ URL::to('img/products', $product->imagePath) }}"></td>
        <td>{{ $product->type }}</td>
        <td>
            <form action="{{ route('staff.products.edit.product') }}" method="post">
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

