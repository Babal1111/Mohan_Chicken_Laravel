@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <div class="card">
        <div class="card-body">
            <h4>Order #{{ $order->id }}</h4>
            <p><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total Amount:</strong> ₹{{ $order->total_amount }}</p>
            <p><strong>Placed At:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            <h5>Items:</h5>
            <ul>
                @foreach($order->orderItems as $item)
                    <li>
                        {{ $item->menuItem->name }} (x{{ $item->quantity }}) - ₹{{ $item->price * $item->quantity }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
</div>
@endsection
