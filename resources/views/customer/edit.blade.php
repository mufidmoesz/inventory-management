<x-app-layout>
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="/customer/{{ $customer->id }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $customer->id }}">
            <div class="form-group mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" value="{{ $customer->name }}">
            </div>
            <div class="form-group mb-3">
                <label for="address" class="form-label">Customer Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Customer Address" value="{{ $customer->address }}">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Customer Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Email" value="{{ $customer->email }}">
            </div>
            <div class="form-group mb-3">
                <label for="phone" class="form-label">Customer Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Customer Phone" value="{{ $customer->phone }}">
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" />
        </form>
    </div>
</x-app-layout>
