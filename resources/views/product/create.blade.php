<x-app-layout>
    <div class="container">
        <h1>Add New Product</h1>
        <form action="/product/add" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name">
            </div>
            <div class="form-group mb-3">
                <label for="description">Product Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Enter product description">
            </div>
            <div class="form-group mb-3">
                <label for="price">Product Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Enter product price">
            </div>
            <div class="form-group mb-3">
                <label for="stock">Product Stock</label>
                <input type="text" class="form-control" name="stock" id="stock" placeholder="Enter product stock">
            </div>
            <div class="form-group mb-3">
                <label for="warehouse_id">Warehouse</label>
                <select name="warehouse_id" id="warehouse_id" class="form-control">
                    <option value="">-- Select Warehouse --</option>
                    @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
</x-app-layout>
