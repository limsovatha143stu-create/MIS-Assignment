@extends('layouts.app')

@section('title', 'Edit borrowing')

@section('content')
    <h1 class="h3 mb-3">Edit borrowing</h1>

    <div class="bg-white p-4 rounded mb-3">
        <p class="mb-1"><strong>Book:</strong> {{ $borrowing->book->title }}</p>
        <p class="mb-0"><strong>Member:</strong> {{ $borrowing->member->name }}</p>
    </div>

    <form action="{{ route('borrowings.update', $borrowing) }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Due date</label>
                <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $borrowing->due_date->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Return date</label>
                <input type="date" name="return_date" class="form-control" value="{{ old('return_date', $borrowing->return_date?->format('Y-m-d')) }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                @foreach (['borrowed', 'returned', 'overdue'] as $status)
                    <option value="{{ $status }}" @selected(old('status', $borrowing->status) === $status)>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
