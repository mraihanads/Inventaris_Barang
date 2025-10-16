@extends('admin.layout.main')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">➕ Tambah Barang</h2>

    {{-- Alert jika ada error --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('barang.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-600 font-medium mb-1">Kode Barang</label>
            <input type="text" name="kode_barang" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Nama Barang</label>
            <input type="text" name="nama" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Tahun Perolehan</label>
            <input type="number" name="tahun_perolehan" min="1900" max="{{ date('Y') }}" value="{{ date('Y') }}" 
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Jumlah</label>
            <input type="number" name="jumlah" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium mb-1">Harga Total</label>
                <input type="number" name="harga_total" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div>
                <label class="block text-gray-600 font-medium mb-1">Harga Per Unit</label>
                <input type="number" name="harga_per_unit" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Kondisi</label>
            <select name="kondisi" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="">-- Pilih Kondisi --</option>
                <option value="Baik">Baik</option>
                <option value="Kurang Baik">Kurang Baik</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Lokasi Barang</label>
            <select name="lokasi_barang_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Lokasi --</option>
                @foreach($lokasi as $l)
                    <option value="{{ $l->id }}">{{ $l->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Perolehan Barang</label>
            <select name="perolehan_barang_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Perolehan --</option>
                @foreach($perolehan as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Catatan</label>
            <textarea name="catatan" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-black font-semibold rounded-md">Simpan</button>
        </div>
    </form>
</div>
@endsection
