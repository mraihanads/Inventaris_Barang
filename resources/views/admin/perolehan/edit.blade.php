@extends('admin.layout.main')
@section('page_heading','Edit Perolehan')

@section('content')
<div class="max-w-2xl">
    @if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('perolehan.update', $perolehan->id) }}" method="POST" 
          class="bg-white p-6 rounded shadow">
        @csrf 
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block mb-1">Nama Perolehan</label>
                <input type="text" name="nama" 
                       value="{{ old('nama', $perolehan->nama) }}" 
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="md:col-span-2">
                <label class="block mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('deskripsi', $perolehan->deskripsi) }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <a href="{{ route('perolehan.index') }}" 
               class="px-4 py-2 bg-gray-400 text-black rounded">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 bg-yellow-500 text-black rounded">Update</button>
        </div>
    </form>
</div>
@endsection
