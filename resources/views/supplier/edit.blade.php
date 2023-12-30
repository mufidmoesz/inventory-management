<x-app-layout>
    <div class="container">
        <h1>Edit Supplier</h1>
        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $supplier->id }}">
            <div class="form-group mt-4 mb-3">
                <label for="name">Supplier Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $supplier->name) }}" placeholder="Supplier Name" aria-describedby="helpId">
                @error('name')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-4 mb-3">
                <label for="address">Supplier Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                    rows="3">{{ old('address', $supplier->address) }}</textarea>
                @error('address')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-4 mb-3">
                <label for="description">Supplier Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    id="description" rows="3">{{ old('description', $supplier->description) }}</textarea>
                @error('description')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-4 mb-3">
                <label for="phone">Supplier Phone</label>
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $supplier->phone) }}" placeholder="Supplier Phone" aria-describedby="helpId">
                @error('phone')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Supplier</button>
        </form>
    </div>
</x-app-layout>
