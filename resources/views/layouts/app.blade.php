<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Abiyyu Ardilian | Fullstack Developer & Project Manager')</title>
    
    <!-- Google Fonts: Plus Jakarta Sans (sama persis dengan merbabudev.id) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>

    @yield('styles')
</head>
<body class="bg-white text-slate-900 min-h-screen flex flex-col antialiased selection:bg-blue-600 selection:text-white">

    {{-- Top Navigation Bar --}}
    @include('components.public.navbar')

    {{-- Main Content --}}
    <main class="flex-1 w-full">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.public.footer')

    @yield('scripts')
</body>
</html>
