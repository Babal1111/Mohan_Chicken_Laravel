@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservation Details</h1>
    <div class="card">
        <div class="card-body">
            <h4>Table: {{ $reservation->table->table_number ?? 'N/A' }}</h4>
            <p><strong>Date:</strong> {{ $reservation->reservation_date }}</p>
            <p><strong>Time:</strong> {{ $reservation->reservation_time }}</p>
            <p><strong>Guests:</strong> {{ $reservation->guests }}</p>
            <p><strong>Status:</strong> {{ ucfirst($reservation->status) }}</p>
        </div>
    </div>
    <a href="{{ route('reservations.index') }}" class="btn btn-secondary mt-3">Back to Reservations</a>
</div>
@endsection
