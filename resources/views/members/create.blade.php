@extends('layouts.app')

@section('title', 'Add member')

@section('content')
    <h1 class="h3 mb-3">Add member</h1>

    <form action="{{ route('members.store') }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        @include('members._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
