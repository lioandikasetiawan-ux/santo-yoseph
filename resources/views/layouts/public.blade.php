<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Paroki Santo Yoseph Sidareja')</title>
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/jpeg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen selection:bg-amber-500 selection:text-white">

    <!-- Navbar Wrapper with Alpine.js Mobile Menu State -->
    <nav x-data="{ mobileMenuOpen: false }" class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand / Logo -->
            <a href="{{ route('public.home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Paroki" class="h-11 w-11 object-cover rounded-full border border-amber-500/30 shadow-md group-hover:scale-105 transition-transform">
                <span class="font-extrabold text-base md:text-lg text-slate-900 tracking-tight font-serif">
                    Paroki Santo Yoseph <span class="text-amber-600">Sidareja</span>
                </span>
            </a>

            <!-- Desktop Navigation Menu -->
            <div class="hidden md:flex items-center space-x-1 lg:space-x-2 text-xs md:text-sm font-bold">
                <a href="{{ route('public.home') }}" 
                   class="px-4 py-2 rounded-full transition duration-200 {{ request()->routeIs('public.home') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:text-amber-600 hover:bg-amber-50/50' }}">
                    Beranda
                </a>
                <a href="{{ route('public.schedules') }}" 
                   class="px-4 py-2 rounded-full transition duration-200 {{ request()->routeIs('public.schedules') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:text-amber-600 hover:bg-amber-50/50' }}">
                    Jadwal Misa
                </a>
                <a href="{{ route('public.announcements') }}" 
                   class="px-4 py-2 rounded-full transition duration-200 {{ request()->routeIs('public.announcements*') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:text-amber-600 hover:bg-amber-50/50' }}">
                    Pengumuman
                </a>
                <a href="{{ route('public.events') }}" 
                   class="px-4 py-2 rounded-full transition duration-200 {{ request()->routeIs('public.events*') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:text-amber-600 hover:bg-amber-50/50' }}">
                    Agenda
                </a>
                <a href="{{ route('public.galleries') }}" 
                   class="px-4 py-2 rounded-full transition duration-200 {{ request()->routeIs('public.galleries') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:text-amber-600 hover:bg-amber-50/50' }}">
                    Galeri
                </a>
            </div>

            <!-- Right Actions (Login Admin & Hamburger Button) -->
            <div class="flex items-center space-x-3">
                <!-- Tombol Login khusus Desktop -->
                <a href="{{ route('login') }}" class="hidden md:inline-flex items-center gap-1.5 text-xs font-bold text-slate-700 hover:text-slate-950 bg-slate-100 hover:bg-amber-400 border border-slate-200/80 hover:border-amber-400 px-4 py-2 rounded-full transition-all duration-300 shadow-sm">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Login Admin
                </a>

                <!-- Hamburger Button (Mobile Only) -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        type="button" 
                        class="md:hidden p-2.5 rounded-2xl text-slate-600 hover:text-amber-600 hover:bg-amber-50 focus:outline-none transition">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div x-show="mobileMenuOpen" 
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden border-t border-slate-100 bg-white/95 backdrop-blur-xl px-4 pt-3 pb-6 space-y-2 shadow-2xl rounded-b-[2rem]">

            <a href="{{ route('public.home') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-bold {{ request()->routeIs('public.home') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:bg-amber-50 hover:text-amber-600' }}">
                Beranda
            </a>
            <a href="{{ route('public.schedules') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-bold {{ request()->routeIs('public.schedules') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:bg-amber-50 hover:text-amber-600' }}">
                Jadwal Misa
            </a>
            <a href="{{ route('public.announcements') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-bold {{ request()->routeIs('public.announcements*') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:bg-amber-50 hover:text-amber-600' }}">
                Pengumuman
            </a>
            <a href="{{ route('public.events') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-bold {{ request()->routeIs('public.events*') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:bg-amber-50 hover:text-amber-600' }}">
                Agenda
            </a>
            <a href="{{ route('public.galleries') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-bold {{ request()->routeIs('public.galleries') ? 'bg-amber-500 text-slate-950 shadow-md shadow-amber-500/20' : 'text-slate-600 hover:bg-amber-50 hover:text-amber-600' }}">
                Galeri
            </a>

            <!-- Tombol Login Admin di dalam menu mobile drawer -->
            <div class="pt-3 border-t border-slate-100">
                <a href="{{ route('login') }}" 
                   class="block text-center px-4 py-3 rounded-xl text-sm font-bold bg-slate-900 text-white hover:bg-amber-500 hover:text-slate-950 transition shadow-md">
                    Login Admin
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Copyright (Opsional karena footer lengkap sudah di-handle di home, atau dibiarkan sebagai fallback universal) -->
    @hasSection('footer')
        @yield('footer')
    @else
        <footer class="bg-slate-950 text-slate-400 py-6 border-t border-slate-800 text-center text-xs">
            <div class="max-w-7xl mx-auto px-4">
                &copy; {{ date('Y') }} Paroki Santo Yoseph Sidareja. All Rights Reserved.
            </div>
        </footer>
    @endif

</body>
</html>