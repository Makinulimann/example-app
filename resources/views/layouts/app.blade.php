<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Add any other head elements or stylesheets here -->
</head>
<body>
    <div id="app">
        <nav>
            <!-- Navigation bar here -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Add any other scripts here -->
</body>
</html>
