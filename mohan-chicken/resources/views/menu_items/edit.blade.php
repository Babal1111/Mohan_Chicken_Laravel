@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Menu Item</h1>
    <form method="POST" action="{{ route('menu-items.update', $menuItem) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $menuItem->name }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($menuItem->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="{{ $menuItem->description }}">
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Price (₹)</label>
            <input type="number" name="price" class="form-control" value="{{ $menuItem->price }}" step="0.01" required>
            @error('price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Current Image</label><br>
            @if($menuItem->image_path)
                <img src="{{ asset('storage/' . $menuItem->image_path) }}" alt="Image" width="80">
            @else
                N/A
            @endif
        </div>
        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image_path" class="form-control">
            @error('image_path') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Menu Item</button>
        <a href="{{ route('menu-items.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
