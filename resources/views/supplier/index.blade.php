<x-app-layout>
    <div class="container">
        <h1>Supplier List</h1>
        <a href="{{ route('supplier.create') }}" class="btn btn-primary my-3">Add New Supplier</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Supplier Name</th>
                    <th>Supplier Address</th>
                    <th style="width: 450px;">Description</th>
                    <th>Supplier Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->description }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>
                            <a href="/supplier/{{ $supplier->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/supplier/{{ $supplier->id }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this supplier?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
