<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:255|unique:books,isbn',
            'total_copies' => 'required|integer|min:1',
            'published_year' => 'nullable|integer',
        ]);

        // A brand new book starts with every copy available.
        $validated['available_copies'] = $validated['total_copies'];

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added.');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:255|unique:books,isbn,' . $book->id,
            'total_copies' => 'required|integer|min:1',
            'available_copies' => 'required|integer|min:0',
            'published_year' => 'nullable|integer',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted.');
    }
}
