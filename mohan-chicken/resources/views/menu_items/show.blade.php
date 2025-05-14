@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Menu Item Details</h1>
    <div class="card">
        <div class="card-body">
            <h4>{{ $menuItem->name }}</h4>
            <p><strong>Category:</strong> {{ $menuItem->category->name ?? 'Uncategorized' }}</p>
            <p><strong>Description:</strong> {{ $menuItem->description }}</p>
            <p><strong>Price:</strong> ₹{{ $menuItem->price }}</p>
            @if($menuItem->image_path)
                <img src="{{ asset('storage/' . $menuItem->image_path) }}" alt="Image" width="120">
            @endif
        </div>
    </div>
    <a href="{{ route('menu-items.index') }}" class="btn btn-secondary mt-3">Back to Menu</a>
</div>
@endsection
