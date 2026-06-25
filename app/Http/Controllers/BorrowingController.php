<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['book', 'member'])->latest()->paginate(10);

        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('available_copies', '>', 0)->orderBy('title')->get();
        $members = Member::orderBy('name')->get();

        return view('borrowings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:borrow_date',
        ]);

        $book = Book::findOrFail($validated['book_id']);

        if ($book->available_copies < 1) {
            return back()->withErrors(['book_id' => 'No copies of this book are currently available.']);
        }

        $validated['status'] = 'borrowed';

        Borrowing::create($validated);

        $book->decrement('available_copies');

        return redirect()->route('borrowings.index')->with('success', 'Book borrowed.');
    }

    public function edit(Borrowing $borrowing)
    {
        return view('borrowings.edit', compact('borrowing'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'due_date' => 'required|date',
            'return_date' => 'nullable|date',
            'status' => 'required|in:borrowed,returned,overdue',
        ]);

        // Only release a copy back to the shelf the moment it first becomes "returned".
        if ($validated['status'] === 'returned' && $borrowing->status !== 'returned') {
            $borrowing->book->increment('available_copies');
            $validated['return_date'] = $validated['return_date'] ?? now()->toDateString();
        }

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated.');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status === 'borrowed') {
            $borrowing->book->increment('available_copies');
        }

        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Borrowing record deleted.');
    }
}
