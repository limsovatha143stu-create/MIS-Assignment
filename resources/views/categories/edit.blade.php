@extends('layouts.app')

@section('title', 'Edit category')

@section('content')
    <h1 class="h3 mb-3">Edit category</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        @method('PUT')
        @include('categories._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
