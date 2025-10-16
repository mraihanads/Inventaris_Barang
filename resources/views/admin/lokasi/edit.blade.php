@extends('layouts.app')
@section('title','Edit Lokasi')

@section('content')
<h2>Edit Lokasi</h2>
<form method="POST" action="{{ route('lokasi.update',$lokasi->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Lokasi</label>
        <input type="text" name="nama" value="{{ $lokasi->nama }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $lokasi->deskripsi }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
