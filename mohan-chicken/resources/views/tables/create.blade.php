@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Table</h1>
    <form method="POST" action="{{ route('tables.store') }}">
        @csrf
        <div class="mb-3">
            <label>Table Number</label>
            <input type="text" name="table_number" class="form-control" required>
            @error('table_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Capacity</label>
            <input type="number" name="capacity" class="form-control" min="1" required>
            @error('capacity') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="available">Available</option>
                <option value="reserved">Reserved</option>
                <option value="occupied">Occupied</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Add Table</button>
        <a href="{{ route('tables.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
