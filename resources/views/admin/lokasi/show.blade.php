@extends('admin.layout.main')
@section('page_heading','Detail Lokasi')

@section('content')
<div class="max-w-2xl bg-white rounded shadow p-6">
    <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <i class="fas fa-map-marker-alt text-indigo-600"></i> {{ $lokasi->nama }}
    </h3>

    <ul class="space-y-2 text-gray-700">
        <li><strong>Nama Lokasi:</strong> {{ $lokasi->nama }}</li>
        <li><strong>Deskripsi:</strong> {{ $lokasi->deskripsi ?? '-' }}</li>
    </ul>

    <div class="mt-6">
        <a href="{{ route('lokasi.index') }}" class="px-4 py-2 bg-indigo-600 text-black rounded">Kembali</a>
        <a href="{{ route('lokasi.edit', $lokasi->id) }}" class="px-4 py-2 bg-yellow-500 text-black rounded">Edit</a>
    </div>
</div>
@endsection
