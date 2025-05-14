@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-red-700">Orders</h1>
        <a href="{{ route('orders.create') }}" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg shadow transition">Place New Order</a>
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
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">User</th>
                    <th class="py-3 px-6 text-left">Total Amount</th>
                    <th class="py-3 px-6 text-left">Status</th>
                    <th class="py-3 px-6 text-left">Placed At</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-6">{{ $order->id }}</td>
                    <td class="py-3 px-6">{{ $order->user->name ?? 'Guest' }}</td>
                    <td class="py-3 px-6 font-bold text-green-600">₹{{ number_format($order->total_amount, 2) }}</td>
                    <td class="py-3 px-6">
                        @php
                            $badgeColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'completed' => 'bg-green-100 text-green-800',
                                'canceled' => 'bg-red-100 text-red-800',
                            ];
                            $status = strtolower($order->status);
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badgeColors[$status] ?? 'bg-gray-200 text-gray-700' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="py-3 px-6">{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('orders.show', $order) }}" class="text-blue-600 hover:underline text-sm font-semibold mr-2">View</a>
                        <a href="{{ route('orders.edit', $order) }}" class="text-yellow-600 hover:underline text-sm font-semibold mr-2">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this order?')" class="text-red-600 hover:underline text-sm font-semibold">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-gray-400">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
