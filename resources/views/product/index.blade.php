<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Product</h1>
                <a href="{{ route('product.create') }}" class="btn btn-primary my-3">Add Product</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Stock</th>
                            <th>Product Price</th>
                            <th>Warehouse Resided</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->warehouse->name }}</td>
                                <td>
                                    <a href="/product/{{ $product->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/product/{{ $product->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
