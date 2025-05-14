@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order (Status Only)</h1>
    <form method="POST" action="{{ route('orders.update', $order) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                <option value="completed" @if($order->status == 'completed') selected @endif>Completed</option>
                <option value="canceled" @if($order->status == 'canceled') selected @endif>Canceled</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Order</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
