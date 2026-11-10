<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#05203c">
    <title>@yield('title', 'TaniSewa') | TaniSewa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 font-sans antialiased text-white">
    <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 bg-cover bg-center bg-fixed"
        style="background-image: linear-gradient(rgba(5, 20, 36, .58), rgba(5, 20, 36, .64)), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=2000&q=90');">
    </div>
    <div class="flex min-h-screen flex-col">
        <x-navbar :username="$username ?? null" :active="$activePage ?? ''" />
        <main class="w-full flex-1">
            @include('components.flash-message')
            @yield('content')
        </main>
    </div>
</body>

</html>
