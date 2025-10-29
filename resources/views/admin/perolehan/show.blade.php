@extends('admin.layout.main')
@section('page_heading','Detail Perolehan')

@section('content')
<div class="max-w-2xl bg-white rounded shadow p-6">
    <h3 class="text-xl font-semibold mb-4">{{ $perolehan->nama }}</h3>

    <ul class="space-y-2 text-gray-700">
        <li><strong>Keterangan:</strong> {{ $perolehan->deskripsi ?? '-' }}</li>
    </ul>

    <div class="mt-6">
        <a href="{{ route('perolehan.index') }}" class="px-4 py-2 bg-indigo-600 text-black rounded">Kembali</a>
        <a href="{{ route('perolehan.edit',$perolehan->id) }}" class="px-4 py-2 bg-yellow-500 text-black rounded">Edit</a>
    </div>
</div>
@endsection
