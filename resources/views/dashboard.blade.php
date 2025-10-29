<x-app-layout>
    <div class="pt-4 pb-8"> {{-- Ubah py-8 menjadi pt-4 pb-8 --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Judul utama di atas kiri --}}
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Dashboard Admin Inventaris</h2>
                <p class="text-gray-600 mt-1">Kelola semua data inventaris di bawah ini.</p>
            </div>

            {{-- Welcome Message --}}
            <div class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white p-6 rounded-lg shadow mb-6">
                <h3 class="text-lg font-bold">Selamat Datang, {{ Auth::user()->nama ?? Auth::user()->email }} 👋</h3>
                <p class="mt-2">Ini adalah dashboard sistem inventaris barang. Kelola semua data dari menu di bawah.</p>
            </div>

            {{-- Grid Menu --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Barang --}}
                <a href="{{ route('barang.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">📦</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Barang</h4>
                            <p class="text-sm text-gray-600">Kelola data barang inventaris</p>
                        </div>
                    </div>
                </a>

                {{-- Lokasi --}}
                <a href="{{ route('lokasi.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">🏠</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Lokasi</h4>
                            <p class="text-sm text-gray-600">Kelola data lokasi penyimpanan</p>
                        </div>
                    </div>
                </a>

                {{-- Perolehan --}}
                <a href="{{ route('perolehan.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full">📝</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Perolehan</h4>
                            <p class="text-sm text-gray-600">Kelola asal perolehan barang</p>
                        </div>
                    </div>
                </a>

                {{-- Pengguna --}}
                <a href="{{ route('pengguna.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-100 rounded-full">👤</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Pengguna</h4>
                            <p class="text-sm text-gray-600">Kelola akun pengguna</p>
                        </div>
                    </div>
                </a>

                {{-- Peran --}}
                <a href="{{ route('peran.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">🎭</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Peran</h4>
                            <p class="text-sm text-gray-600">Kelola peran (role) pengguna</p>
                        </div>
                    </div>
                </a>

                {{-- Hak Akses --}}
                <a href="{{ route('hak.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:shadow-lg transition">
                    <div class="flex items-center">
                        <div class="p-3 bg-pink-100 rounded-full">🔑</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Hak Akses</h4>
                            <p class="text-sm text-gray-600">Kelola hak akses (permission)</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
