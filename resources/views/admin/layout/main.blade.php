<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin') - Inventaris</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { overflow-x: hidden; }
        main { transition: margin-left 0.3s ease; }
        @media (min-width: 768px) { main { margin-left: 16rem; } } /* w-64 = 16rem */
        .nav-active { background-color: #eef2ff; color: #4f46e5 !important; font-weight: 600; }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- Header fixed --}}
    <header class="bg-indigo-600 text-white py-4 px-6 md:px-8 fixed top-0 left-0 w-full z-40 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <button id="toggleSidebar" class="md:hidden text-2xl focus:outline-none" aria-label="Toggle sidebar">
                <i class="fas fa-bars"></i>
            </button>
            <h2 class="text-2xl font-semibold">@yield('page_heading','Dashboard Admin')</h2>
        </div>
        <div class="flex items-center gap-3">
            <span class="hidden sm:block text-sm">Halo, <strong>{{ Auth::user()->nama ?? Auth::user()->email }}</strong></span>
            <div class="w-9 h-9 bg-white text-indigo-600 flex items-center justify-center rounded-full font-bold">
                {{ strtoupper(substr(Auth::user()->nama ?? 'A', 0, 1)) }}
            </div>
        </div>
    </header>

    {{-- Sidebar --}}
    <aside id="sidebar" class="w-64 bg-white shadow-md fixed top-16 bottom-0 left-0 flex flex-col justify-between transform md:translate-x-0 -translate-x-full transition-transform duration-300 z-30">
        <div class="overflow-y-auto">
            <div class="p-6 border-b">
                <h1 class="text-2xl font-bold text-indigo-600">INVENTARIS</h1>
            </div>

            <nav class="mt-6 space-y-1">
                <p class="px-6 text-gray-400 text-xs uppercase mb-1">Dashboard</p>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-indigo-50 text-gray-700 {{ request()->routeIs('admin.dashboard') ? 'nav-active' : '' }}">
                    <i class="fas fa-fire mr-3"></i> Dashboard
                </a>

                <p class="px-6 text-gray-400 text-xs uppercase mt-5 mb-1">Manajemen</p>
                <a href="{{ route('barang.index') }}" class="flex items-center px-6 py-3 hover:bg-indigo-50 text-gray-700 {{ request()->is('barang*') ? 'nav-active' : '' }}">
                    <i class="fas fa-box mr-3"></i> Data Barang
                </a>
                <a href="{{ route('perolehan.index') }}" class="flex items-center px-6 py-3 hover:bg-indigo-50 text-gray-700 {{ request()->is('perolehan*') ? 'nav-active' : '' }}">
                    <i class="fas fa-file-alt mr-3"></i> Data Perolehan
                </a>
                <a href="{{ route('lokasi.index') }}" class="flex items-center px-6 py-3 hover:bg-indigo-50 text-gray-700 {{ request()->is('lokasi*') ? 'nav-active' : '' }}">
                    <i class="fas fa-building mr-3"></i> Data Ruangan
                </a>
                <p class="px-6 text-gray-400 text-xs uppercase mt-5 mb-1">Pengaturan</p>
                <a href="{{ route('profile.edit') }}" class="flex items-center px-6 py-3 hover:bg-indigo-50 text-gray-700 {{ request()->routeIs('profile.edit') ? 'nav-active' : '' }}">
                    <i class="fas fa-cog mr-3"></i> Pengaturan Profil
                </a>
            </nav>
        </div>

        <div class="p-6 border-t bg-gray-50">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full bg-red-500 text-black py-2 rounded-md font-semibold hover:bg-red-600">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <main id="mainContent" class="pt-24 p-6 bg-gray-50 min-h-screen">
        @yield('content')
    </main>

    {{-- Toggle script --}}
    <script>
        (function () {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggleSidebar');
            if (!toggleBtn) return;
            toggleBtn.addEventListener('click', () => sidebar.classList.toggle('-translate-x-full'));
        })();
    </script>
</body>
</html>
