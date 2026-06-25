<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select" required>
        <option value="">Select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Author</label>
    <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">ISBN</label>
    <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn ?? '') }}">
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Total copies</label>
        <input type="number" name="total_copies" min="1" class="form-control" value="{{ old('total_copies', $book->total_copies ?? 1) }}" required>
    </div>
    @isset($book)
        <div class="col-md-4 mb-3">
            <label class="form-label">Available copies</label>
            <input type="number" name="available_copies" min="0" class="form-control" value="{{ old('available_copies', $book->available_copies) }}" required>
        </div>
    @endisset
    <div class="col-md-4 mb-3">
        <label class="form-label">Published year</label>
        <input type="number" name="published_year" class="form-control" value="{{ old('published_year', $book->published_year ?? '') }}">
    </div>
</div>
