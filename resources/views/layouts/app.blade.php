<!DOCTYPE html>
<html lang="en" class="h-full w-full">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - SPK Beasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        html, body {
            border-radius: 0 !important;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="bg-[#C7CEDB] h-screen w-screen overflow-hidden">

    <!-- Sidebar -->
    <div class="fixed top-0 left-0 w-64 h-full bg-blue-700">
        @include('layouts.sidebar')
    </div>

    <!-- Main Content -->
    <div class="ml-64 flex flex-col h-full">

        <!-- Navbar -->
        <div class="h-16 bg-white flex items-center justify-end px-6 shadow-md">
            @include('layouts.navbar')
        </div>

        <!-- Header Title -->
        <div class="bg-[#C7CEDB] px-6 py-4 flex items-center space-x-2 sticky top-16 z-10">
            <i data-lucide="home" class="w-7 h-7 text-black-700"></i>
            <h1 class="text-2xl font-bold text-black-700">@yield('title')</h1>
        </div>

        <!-- Fixed White Content -->
        <div class="flex-3 bg-white m-4 shadow-md overflow-hidden flex flex-col">

            <!-- Scrollable Inner Content -->
            <div class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </div>

        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
