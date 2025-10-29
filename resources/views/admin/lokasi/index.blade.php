@extends('admin.layout.main')
@section('page_heading','Data Lokasi')

@section('content')
<div class="bg-white rounded-2xl shadow p-6">
    <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-6 gap-3">
        <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fas fa-map-marker-alt text-indigo-600"></i> Data Lokasi
        </h2>
        <a href="{{ route('lokasi.create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-black px-5 py-2 rounded-lg shadow-md transition">
            + Tambah Lokasi
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
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Deskripsi</th>
                    <th class="px-4 py-3 text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lokasi as $l)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $l->nama }}</td>
                    <td class="px-4 py-3 text-black-600">{{ $l->deskripsi ?? '-' }}</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('lokasi.show',$l->id) }}" 
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-black px-3 py-1 rounded">Lihat</a>
                        <a href="{{ route('lokasi.edit',$l->id) }}" 
                           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('lokasi.destroy',$l->id) }}" method="POST" class="inline">
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
                    <td colspan="3" class="text-center py-8 text-gray-500">
                        <i class="fas fa-map text-4xl mb-2 block text-indigo-300"></i>
                        Belum ada data lokasi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
