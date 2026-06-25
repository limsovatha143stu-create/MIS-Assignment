@extends('layouts.app')

@section('title', 'Borrowings')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Borrowings</h1>
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">New borrowing</a>
    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Book</th>
                <th>Member</th>
                <th>Borrowed</th>
                <th>Due</th>
                <th>Returned</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->book->title ?? '—' }}</td>
                    <td>{{ $borrowing->member->name ?? '—' }}</td>
                    <td>{{ $borrowing->borrow_date->format('M d, Y') }}</td>
                    <td>{{ $borrowing->due_date->format('M d, Y') }}</td>
                    <td>{{ $borrowing->return_date?->format('M d, Y') ?? '—' }}</td>
                    <td>
                        <span class="badge bg-{{ $borrowing->status === 'returned' ? 'success' : ($borrowing->status === 'overdue' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($borrowing->status) }}
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted">No borrowing records yet.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $borrowings->links() }}
@endsection
