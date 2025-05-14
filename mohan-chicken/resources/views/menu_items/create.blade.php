@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Menu Item</h1>
    <form method="POST" action="{{ route('menu-items.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        {{-- <div class="mb-3">
            <label>Description</label>
            <input type="text" name="description" class="form-control">
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div> --}}
        <div class="mb-3">
            <label>Price (₹)</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
            @error('price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image_path" class="form-control">
            @error('image_path') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Add Menu Item</button>
        <a href="{{ route('menu-items.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
