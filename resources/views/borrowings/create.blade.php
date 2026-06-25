@extends('layouts.app')

@section('title', 'New borrowing')

@section('content')
    <h1 class="h3 mb-3">New borrowing</h1>

    <form action="{{ route('borrowings.store') }}" method="POST" class="bg-white p-4 rounded">
        @csrf
        <div class="mb-3">
            <label class="form-label">Book</label>
            <select name="book_id" class="form-select" required>
                <option value="">Select an available book</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" @selected(old('book_id') == $book->id)>
                        {{ $book->title }} ({{ $book->available_copies }} available)
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Member</label>
            <select name="member_id" class="form-select" required>
                <option value="">Select a member</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" @selected(old('member_id') == $member->id)>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Borrow date</label>
                <input type="date" name="borrow_date" class="form-control" value="{{ old('borrow_date', now()->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Due date</label>
                <input type="date" name="due_date" class="form-control" value="{{ old('due_date', now()->addWeeks(2)->format('Y-m-d')) }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
