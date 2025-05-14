<!-- resources/views/categories/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Category Details</h1>
    <div class="card">
        <div class="card-body">
            <h4>{{ $category->name }}</h4>
            <p>{{ $category->description }}</p>
        </div>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
</div>
@endsection
