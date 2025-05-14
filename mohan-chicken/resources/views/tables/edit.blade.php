@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Table</h1>
    <form method="POST" action="{{ route('tables.update', $table) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Table Number</label>
            <input type="text" name="table_number" class="form-control" value="{{ $table->table_number }}" required>
            @error('table_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{ $table->capacity }}" min="1" required>
            @error('capacity') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="available" @if($table->status == 'available') selected @endif>Available</option>
                <option value="reserved" @if($table->status == 'reserved') selected @endif>Reserved</option>
                <option value="occupied" @if($table->status == 'occupied') selected @endif>Occupied</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Table</button>
        <a href="{{ route('tables.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
