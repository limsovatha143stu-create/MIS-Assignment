@extends('layouts.app')

@section('title', 'Members')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Members</h1>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Add member</a>
    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Member since</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->membership_date->format('M d, Y') }}</td>
                    <td class="text-end">
                        <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline delete-form" data-item-name="{{ $member->name }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">No members yet.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $members->links() }}
@endsection
