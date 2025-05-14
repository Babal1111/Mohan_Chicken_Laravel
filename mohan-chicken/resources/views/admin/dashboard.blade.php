@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
        <li><a href="{{ route('menu-items.index') }}">Manage Menu Items</a></li>
        <li><a href="{{ route('orders.index') }}">Manage Orders</a></li>
        <li><a href="{{ route('reservations.index') }}">Manage Reservations</a></li>
        <li><a href="{{ route('tables.index') }}">Manage Tables</a></li>
    </ul>
</div>
@endsection
