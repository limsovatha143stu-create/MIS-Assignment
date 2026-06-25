@extends('layouts.app')

@section('title', 'Edit book')

@section('content')
    <h1 class="h3 mb-3">Edit book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        @method('PUT')
        @include('books._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
