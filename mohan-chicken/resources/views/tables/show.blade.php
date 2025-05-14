@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Table Details</h1>
    <div class="card">
        <div class="card-body">
            <h4>Table Number: {{ $table->table_number }}</h4>
            <p><strong>Capacity:</strong> {{ $table->capacity }}</p>
            <p><strong>Status:</strong> {{ ucfirst($table->status) }}</p>
        </div>
    </div>
    <a href="{{ route('tables.index') }}" class="btn btn-secondary mt-3">Back to Tables</a>
</div>
@endsection
