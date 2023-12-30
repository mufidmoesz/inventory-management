<x-app-layout>
    <div class="container">
        <h1>Edit Warehouse</h1>
        <form action="/warehouse/{{ $warehouse->id }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $warehouse->id }}">
            <div class="form-group mb-3">
                <label for="name">Warehouse Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $warehouse->name }}">
            </div>
            <div class="form-group mb-3">
                <label for="region">Warehouse Region</label>
                <input type="text" class="form-control" name="region" id="region" value="{{ $warehouse->region }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit Warehouse</button>
        </form>
    </div>
</x-app-layout>
