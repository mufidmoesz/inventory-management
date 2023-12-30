<x-app-layout>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="/product/{{ $product->id }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="form-group mb-3">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
            </div>
            <div class="form-group mb-3">
                <label for="description">Product Description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
            </div>
            <div class="form-group mb-3">
                <label for="price">Product Price</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
            </div>
            <div class="form-group mb-3">
                <label for="stock">Product Stock</label>
                <input type="text" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
            </div>
            <div class="form-group mb-3">
                <label for="warehouse_id">Warehouse</label>
                <select name="warehouse_id" id="warehouse_id" class="form-control">
                    <option value="">-- Select Warehouse --</option>
                    @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}" {{ $warehouse->id == $product->warehouse_id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Edit Product</button>
        </form>
    </div>
</x-app-layout>
