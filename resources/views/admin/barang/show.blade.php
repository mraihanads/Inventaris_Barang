@extends('admin.layout.main')
@section('page_heading','Detail Barang')
@section('content')
<div class="max-w-2xl bg-white rounded shadow p-6">
    <h3 class="text-xl font-semibold mb-4">{{ $barang->nama }}</h3>

    <ul class="space-y-2 text-gray-700">
        <li><strong>Kode:</strong> {{ $barang->kode_barang }}</li>
        <li><strong>Lokasi:</strong> {{ $barang->lokasi->nama ?? '-' }}</li>
        <li><strong>Perolehan:</strong> {{ $barang->perolehan->nama ?? '-' }}</li>
        <li><strong>Jumlah:</strong> {{ $barang->jumlah }}</li>
        <li><strong>Kondisi:</strong> {{ $barang->kondisi }}</li>
        <li><strong>Harga Total:</strong> Rp{{ number_format($barang->harga_total,0,',','.') }}</li>
        <li><strong>Harga Per Unit:</strong> Rp{{ number_format($barang->harga_per_unit,0,',','.') }}</li>
        <li><strong>Catatan:</strong> {{ $barang->catatan ?? '-' }}</li>
    </ul>

    <div class="mt-6">
        <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-indigo-600 text-black rounded">Kembali</a>
        <a href="{{ route('barang.edit',$barang->id) }}" class="px-4 py-2 bg-yellow-500 text-black rounded">Edit</a>
    </div>
</div>
@endsection
