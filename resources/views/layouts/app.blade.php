<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Library Borrowing System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --purple-50: #EEEDFE;
            --purple-200: #AFA9EC;
            --purple-600: #534AB7;
            --purple-800: #3C3489;
        }
        body { background-color: var(--purple-50); }
        .navbar { background-color: var(--purple-800) !important; }
        .navbar-brand, .nav-link { color: #fff !important; }
        .navbar-brand:hover, .nav-link:hover { color: var(--purple-200) !important; }
        .btn-primary { background-color: var(--purple-600); border-color: var(--purple-600); }
        .btn-primary:hover { background-color: var(--purple-800); border-color: var(--purple-800); }
        table thead { background-color: var(--purple-200); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('books.index') }}">Library System</a>
            <div class="navbar-nav flex-row gap-3">
                <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                <a class="nav-link" href="{{ route('members.index') }}">Members</a>
                <a class="nav-link" href="{{ route('borrowings.index') }}">Borrowings</a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
