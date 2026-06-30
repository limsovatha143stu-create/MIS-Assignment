@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add category</a>
    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="text-end">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline delete-form" data-item-name="{{ $member->name }}">
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center text-muted">No categories yet.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
