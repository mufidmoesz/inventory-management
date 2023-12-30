<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Warehouse</h1>
                <a href="{{ route('warehouse.create') }}" class="btn btn-primary my-3">Add Warehouse</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Warehouse Name</th>
                            <th>Warehouse Region</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($warehouses as $warehouse)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $warehouse->name }}</td>
                                <td>{{ $warehouse->region }}</td>
                                <td>
                                    <a href="/warehouse/{{ $warehouse->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/warehouse/{{ $warehouse->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
