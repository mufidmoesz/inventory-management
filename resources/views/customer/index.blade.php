<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Customers</h1>
                <a href="{{ route('customer.create') }}" class="btn btn-primary my-3">Create Customer</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <a href="/customer/{{ $customer->id }}/edit" class="btn btn-primary">Edit</a>
                                <form action="/customer/{{ $customer->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?')" />
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
