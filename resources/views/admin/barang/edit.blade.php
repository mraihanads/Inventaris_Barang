@extends('admin.layout.main')
@section('page_heading','Edit Barang')

@section('content')
<div class="max-w-2xl">
    @if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">@foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach</ul>
    </div>
    @endif

    <form action="{{ route('barang.update',$barang->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf @method('PUT')
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang',$barang->kode_barang) }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block mb-1">Nama Barang</label>
                <input type="text" name="nama" value="{{ old('nama',$barang->nama) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1">Tahun Perolehan</label>
                <input type="number" name="tahun_perolehan" value="{{ old('tahun_perolehan',$barang->tahun_perolehan) }}" min="1900" max="{{ date('Y') }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1">Harga</label>
                <input type="number" name="harga" value="{{ old('harga',$barang->harga) }}" class="w-full border rounded px-3 py-2" min="0" required>
            </div>

            <div>
                <label class="block mb-1">Lokasi</label>
                <select name="lokasi_barang_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Lokasi --</option>
                    @foreach($lokasi as $l)
                        <option value="{{ $l->id }}" {{ (old('lokasi_barang_id',$barang->lokasi_barang_id) == $l->id) ? 'selected' : '' }}>
                            {{ $l->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1">Perolehan</label>
                <select name="perolehan_barang_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Perolehan --</option>
                    @foreach($perolehan as $p)
                        <option value="{{ $p->id }}" {{ (old('perolehan_barang_id',$barang->perolehan_barang_id) == $p->id) ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block mb-1">Kondisi</label>
                <select name="kondisi" class="w-full border rounded px-3 py-2">
                    <option value="Baik" {{ old('kondisi',$barang->kondisi)=='Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Kurang Baik" {{ old('kondisi',$barang->kondisi)=='Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                    <option value="Rusak Berat" {{ old('kondisi',$barang->kondisi)=='Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border rounded px-3 py-2" rows="3">{{ old('catatan',$barang->catatan) }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-400 text-black rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded">Update</button>
        </div>
    </form>
</div>
@endsection
