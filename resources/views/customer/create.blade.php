<x-app-layout>
    <div class="container">
        <h1>Add New Customer</h1>
        <form action="/customer/add" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name">
            </div>
            <div class="form-group mb-3">
                <label for="address" class="form-label">Customer Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Customer Address">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Customer Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Email">
            </div>
            <div class="form-group mb-3">
                <label for="phone" class="form-label">Customer Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Customer Phone">
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>
    </div>
</x-app-layout>
