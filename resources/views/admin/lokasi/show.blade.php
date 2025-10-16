@extends('layouts.app')
@section('title','Detail Lokasi')

@section('content')
<h2>Detail Lokasi</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>Nama:</strong> {{ $lokasi->nama }}</li>
    <li class="list-group-item"><strong>Deskripsi:</strong> {{ $lokasi->deskripsi }}</li>
</ul>
<a href="{{ route('lokasi.index') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection
