@extends('layouts.app')

@section('title', 'Add book')

@section('content')
    <h1 class="h3 mb-3">Add book</h1>

    <form action="{{ route('books.store') }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        @include('books._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
