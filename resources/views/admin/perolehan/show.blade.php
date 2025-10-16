@extends('layouts.app')
@section('title','Detail Perolehan')

@section('content')
<h2>Detail Perolehan</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>Nama:</strong> {{ $perolehan->nama }}</li>
    <li class="list-group-item"><strong>Deskripsi:</strong> {{ $perolehan->deskripsi }}</li>
</ul>
<a href="{{ route('perolehan.index') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection
