@extends('admin.layout.main')
@section('page_heading','Dashboard')
@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->nama ?? 'Administrator' }}</h1>
        <p class="text-gray-500 mt-1">Kelola inventaris barang di sini.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-indigo-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Total Barang</p>
                    <h2 class="text-2xl font-semibold text-gray-700">{{ \App\Models\Barang::count() }}</h2>
                </div>
                <i class="fas fa-box text-indigo-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-green-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Total Lokasi</p>
                    <h2 class="text-2xl font-semibold text-gray-700">{{ \App\Models\LokasiBarang::count() }}</h2>
                </div>
                <i class="fas fa-building text-green-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Perolehan</p>
                    <h2 class="text-2xl font-semibold text-gray-700">{{ \App\Models\PerolehanBarang::count() }}</h2>
                </div>
                <i class="fas fa-file-alt text-yellow-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-red-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Pengguna</p>
                    <h2 class="text-2xl font-semibold text-gray-700">{{ \App\Models\Pengguna::count() }}</h2>
                </div>
                <i class="fas fa-users text-red-500 text-3xl"></i>
            </div>
        </div>
    </div>
</div>
@endsection
