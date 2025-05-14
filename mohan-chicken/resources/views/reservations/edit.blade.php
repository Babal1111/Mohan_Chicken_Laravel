@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Reservation</h1>
    <form method="POST" action="{{ route('reservations.update', $reservation) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Table</label>
            <select name="table_id" class="form-control" required>
                @foreach($tables as $table)
                    <option value="{{ $table->id }}" @if($reservation->table_id == $table->id) selected @endif>
                        Table {{ $table->table_number }} (Seats: {{ $table->capacity }})
                    </option>
                @endforeach
            </select>
            @error('table_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="reservation_date" class="form-control" value="{{ $reservation->reservation_date }}" required>
            @error('reservation_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Time</label>
            <input type="time" name="reservation_time" class="form-control" value="{{ $reservation->reservation_time }}" required>
            @error('reservation_time') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Number of Guests</label>
            <input type="number" name="guests" class="form-control" value="{{ $reservation->guests }}" min="1" required>
            @error('guests') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" @if($reservation->status == 'pending') selected @endif>Pending</option>
                <option value="confirmed" @if($reservation->status == 'confirmed') selected @endif>Confirmed</option>
                <option value="canceled" @if($reservation->status == 'canceled') selected @endif>Canceled</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Reservation</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
