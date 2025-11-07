@extends('admin.layout.main')
@section('page_heading','Dashboard')
@section('content')
<div class="space-y-10 fade-in bg-white min-h-screen p-6">

    {{-- Header --}}
    <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-8">
        <h1 class="text-4xl font-bold text-gray-900">Selamat Datang Di Inventaris PNL</h1>
    </div>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        {{-- Total Barang --}}
        <div class="card-clean group">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Barang</p>
                    <h2 class="text-4xl font-bold text-gray-900 mt-2">{{ \App\Models\Barang::count() }}</h2>
                </div>
                <div class="icon-circle group-hover:bg-gray-100">
                    <i class="fas fa-box text-gray-700 text-2xl"></i>
                </div>
            </div>
        </div>

        {{-- Total Lokasi --}}
        <div class="card-clean group">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Lokasi</p>
                    <h2 class="text-4xl font-bold text-gray-900 mt-2">{{ \App\Models\LokasiBarang::count() }}</h2>
                </div>
                <div class="icon-circle group-hover:bg-gray-100">
                    <i class="fas fa-building text-gray-700 text-2xl"></i>
                </div>
            </div>
        </div>

        {{-- Total Perolehan --}}
        <div class="card-clean group">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Perolehan</p>
                    <h2 class="text-4xl font-bold text-gray-900 mt-2">{{ \App\Models\PerolehanBarang::count() }}</h2>
                </div>
        </div>
    </div>

</div>

{{-- CSS tambahan untuk gaya clean (SUDAH DIUBAH) --}}
<style>
    .card-clean {
        /* Peningkatan Estetika */
        @apply bg-white border border-gray-100 rounded-3xl p-8 shadow-lg transition-all duration-500 ease-in-out;
        /* Efek Hover Lebih Menarik */
        transform: translate(0); /* Untuk memastikan transisi bekerja */
    }

    .card-clean:hover {
        @apply shadow-2xl;
        transform: translateY(-5px) scale(1.01); /* Naik sedikit dan membesar */
    }

    .icon-circle {
        /* Ukuran Lebih Besar dan Bentuk Lebih Bulat */
        @apply p-5 rounded-full flex items-center justify-center bg-gray-50 transition-all duration-300;
        /* Penggunaan warna aksen */
        color: #3b82f6; /* Menggunakan biru default Tailwind (Blue-500) sebagai contoh */
    }

    .group:hover .icon-circle {
        @apply bg-blue-500/10; /* Latar belakang ikon berubah menjadi biru transparan */
    }

    .group:hover .icon-circle i {
         @apply text-blue-600; /* Warna ikon menjadi biru saat hover */
    }
    
    .fade-in {
        animation: fadeInUp 0.8s ease-in-out;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

