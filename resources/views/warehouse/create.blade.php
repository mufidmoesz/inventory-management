<x-app-layout>
    <div class="container">
        <h1>Add New Warehouse</h1>
        <form action="/warehouse/add" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Warehouse Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter warehouse name">
            </div>
            <div class="form-group mb-3">
                <label for="region">Warehouse Region</label>
                <input type="text" class="form-control" name="region" id="region" placeholder="Enter warehouse region">
            </div>
            <button type="submit" class="btn btn-primary">Add Warehouse</button>
    </div>
</x-app-layout>
