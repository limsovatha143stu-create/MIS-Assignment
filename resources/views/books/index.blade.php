@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add book</a>
    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Available</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name ?? '—' }}</td>
                    <td>{{ $book->available_copies }} / {{ $book->total_copies }}</td>
                    <td class="text-end">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this book?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">No books yet.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}
@endsection
