@extends('layouts.app')

@section('title', 'Edit member')

@section('content')
    <h1 class="h3 mb-3">Edit member</h1>

    <form action="{{ route('members.update', $member) }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        @method('PUT')
        @include('members._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
