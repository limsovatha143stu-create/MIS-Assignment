@extends('layouts.app')

@section('title', 'Add category')

@section('content')
    <h1 class="h3 mb-3">Add category</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        @include('categories._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
