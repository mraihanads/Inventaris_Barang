@extends('admin.layout.main')
@section('page_heading','Data Barang')

@section('content')
<div class="bg-white rounded-2xl shadow p-6">
    <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-6 gap-3">
        <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fas fa-box text-indigo-600"></i> Data Barang
        </h2>
        <a href="{{ route('barang.create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-black px-5 py-2 rounded-lg shadow-md transition">
            + Tambah Barang
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-indigo-600 text-black">
                <tr>
                    <th class="px-4 py-3 text-left">Kode</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Lokasi</th>
                    <th class="px-4 py-3 text-center">Jumlah</th>
                    <th class="px-4 py-3 text-right">Harga Total</th>
                    <th class="px-4 py-3 text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $b)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $b->kode_barang }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $b->nama }}</td>
                    <td class="px-4 py-3">{{ $b->lokasi->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $b->jumlah }}</td>
                    <td class="px-4 py-3 text-right font-semibold text-gray-700">
                        Rp{{ number_format($b->harga_total,0,',','.') }}
                    </td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('barang.show',$b->id) }}" 
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-black px-3 py-1 rounded">Lihat</a>
                        <a href="{{ route('barang.edit',$b->id) }}" 
                           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('barang.destroy',$b->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus data ini?')" 
                                    class="bg-red-500 hover:bg-red-600 text-black px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500">
                        <i class="fas fa-box-open text-4xl mb-2 block text-indigo-300"></i>
                        Belum ada data barang.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
