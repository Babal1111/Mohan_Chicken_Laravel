@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-red-700">Our Menu</h1>
        <a href="{{ route('menu-items.create') }}" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg shadow transition">Add Menu Item</a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($menuItems as $menuItem)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col">
            @if($menuItem->image_path)
                <img src="{{ asset('storage/' . $menuItem->image_path) }}" alt="{{ $menuItem->name }}" class="h-48 w-full object-cover rounded-t-lg">
            @else
                <div class="h-48 w-full bg-gray-100 flex items-center justify-center rounded-t-lg text-gray-400">No Image</div>
            @endif
            <div class="p-4 flex-1 flex flex-col">
                <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $menuItem->name }}</h3>
                <div class="text-sm text-gray-500 mb-2">{{ $menuItem->category->name ?? 'Uncategorized' }}</div>
                @if($menuItem->description)
                    <p class="text-gray-600 mb-4 flex-1">{{ $menuItem->description }}</p>
                @endif
                <div class="flex items-center justify-between mt-auto">
                    <span class="text-lg font-bold text-green-600">₹{{ $menuItem->price }}</span>
                    <div class="flex space-x-2">
                        <a href="{{ route('menu-items.show', $menuItem) }}" class="text-blue-500 hover:underline text-sm">View</a>
                        <a href="{{ route('menu-items.edit', $menuItem) }}" class="text-yellow-500 hover:underline text-sm">Edit</a>
                        <form action="{{ route('menu-items.destroy', $menuItem) }}" method="POST" onsubmit="return confirm('Delete this menu item?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="col-span-4 text-center text-gray-500">
                No menu items found.
            </div>
        @endforelse
    </div>
</div>
@endsection
