@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-12 mb-10 bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-3xl font-extrabold text-red-700 mb-6 text-center">Place Your Order</h1>
    <p class="text-center text-gray-600 mb-8">Select your favorite dishes and let us serve you the best of <span class="font-bold text-red-500">Mohan Chicken</span>!</p>
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            @foreach($menuItems as $item)
                <div class="flex items-center bg-gray-50 rounded-lg shadow-sm p-4">
                    <input type="checkbox" name="menu_item_ids[]" value="{{ $item->id }}" id="item{{ $item->id }}" class="h-5 w-5 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                    <label for="item{{ $item->id }}" class="ml-3 flex-1">
                        <span class="block text-lg font-semibold text-gray-800">{{ $item->name }}</span>
                        <span class="block text-gray-500 text-sm">{{ $item->category->name ?? 'Uncategorized' }}</span>
                        <span class="block text-green-600 font-bold">₹{{ $item->price }}</span>
                    </label>
                    <input type="number" name="quantities[{{ $item->id }}]" min="1" placeholder="Qty" class="ml-4 w-20 border border-gray-300 rounded-lg px-2 py-1 focus:ring-2 focus:ring-red-400 focus:outline-none" style="width: 80px;">
                </div>
            @endforeach
        </div>
        @error('menu_item_ids') <div class="text-red-500 text-sm mb-4">{{ $message }}</div> @enderror

        <div class="flex justify-center gap-4 mt-6">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-2 rounded-lg shadow transition">Place Order</button>
            <a href="{{ route('orders.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-6 py-2 rounded-lg shadow transition">Back</a>
        </div>
    </form>
</div>
@endsection
