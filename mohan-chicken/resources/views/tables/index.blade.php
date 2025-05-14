@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tables</h1>
    <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Add Table</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Table Number</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
            <tr>
                <td>{{ $table->id }}</td>
                <td>{{ $table->table_number }}</td>
                <td>{{ $table->capacity }}</td>
                <td>{{ ucfirst($table->status) }}</td>
                <td>
                    <a href="{{ route('tables.show', $table) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('tables.edit', $table) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tables.destroy', $table) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this table?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
