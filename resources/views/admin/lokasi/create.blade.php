@extends('layouts.app')
@section('title','Tambah Lokasi')

@section('content')
<h2>Tambah Lokasi</h2>
<form method="POST" action="{{ route('lokasi.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Lokasi</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
