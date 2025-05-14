@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-12 mb-10 bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-3xl font-extrabold text-red-700 mb-6 text-center">Book a Table</h1>
    <p class="text-center text-gray-600 mb-8">Reserve your spot and enjoy a delicious experience at <span class="font-bold text-red-500">Mohan Chicken</span>!</p>
    <form method="POST" action="{{ route('reservations.store') }}" class="space-y-6">
        @csrf
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Table</label>
            <select name="table_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none" required>
                <option value="">Select Table</option>
                @foreach($tables as $table)
                    <option value="{{ $table->id }}">Table {{ $table->table_number }} (Seats: {{ $table->capacity }})</option>
                @endforeach
            </select>
            @error('table_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Date</label>
            <input type="date" name="reservation_date" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none" required>
            @error('reservation_date') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Time</label>
            <input type="time" name="reservation_time" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none" required>
            @error('reservation_time') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Number of Guests</label>
            <input type="number" name="guests" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400 focus:outline-none" required>
            @error('guests') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div class="flex justify-center gap-4 mt-6">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-2 rounded-lg shadow transition">Book Table</button>
            <a href="{{ route('reservations.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-6 py-2 rounded-lg shadow transition">Back</a>
        </div>
    </form>
</div>
@endsection
