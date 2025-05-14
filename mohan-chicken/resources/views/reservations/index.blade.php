@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-red-700">Reservations</h1>
        <a href="{{ route('reservations.create') }}" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg shadow transition">New Reservation</a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Table</th>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Time</th>
                    <th class="py-3 px-6 text-left">Guests</th>
                    <th class="py-3 px-6 text-left">Status</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($reservations as $reservation)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-6 font-semibold">
                        {{ $reservation->table->table_number ?? 'N/A' }}
                        <span class="block text-sm text-gray-500">({{ $reservation->table->capacity ?? '' }} seats)</span>
                    </td>
                    <td class="py-3 px-6">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }}</td>
                    <td class="py-3 px-6">{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('h:i A') }}</td>
                    <td class="py-3 px-6 font-semibold">{{ $reservation->guests }}</td>
                    <td class="py-3 px-6">
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'confirmed' => 'bg-green-100 text-green-800',
                                'canceled' => 'bg-red-100 text-red-800',
                                'completed' => 'bg-blue-100 text-blue-800'
                            ];
                            $status = strtolower($reservation->status);
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$status] ?? 'bg-gray-200 text-gray-700' }}">
                            {{ ucfirst($reservation->status) }}
                        </span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('reservations.show', $reservation) }}" class="text-blue-600 hover:underline text-sm font-semibold mr-2">View</a>
                        <a href="{{ route('reservations.edit', $reservation) }}" class="text-yellow-600 hover:underline text-sm font-semibold mr-2">Edit</a>
                        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this reservation?')" class="text-red-600 hover:underline text-sm font-semibold">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-gray-400">No reservations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
