@extends('admin.layout.main')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">➕ Tambah Perolehan</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('perolehan.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-600 font-medium mb-1">Nama Perolehan</label>
            <input type="text" name="nama" value="{{ old('nama') }}" 
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                   required>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3" 
                      class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('perolehan.index') }}" 
               class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-black font-semibold rounded-md">Simpan</button>
        </div>
    </form>
</div>
@endsection
