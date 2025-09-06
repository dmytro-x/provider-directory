<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Service Providers')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
<header class="bg-white shadow p-4 mb-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Service Providers</h1>
    </div>
</header>

<main class="container mx-auto">
    @yield('content')
</main>

<footer class="text-center text-sm text-gray-500 py-6">
    &copy; {{ date('Y') }} Service Provider Test Project
</footer>
</body>
</html>
