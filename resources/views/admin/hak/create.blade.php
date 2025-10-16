@extends('layouts.app')
@section('title','Tambah Hak Akses')

@section('content')
<h2>Tambah Hak Akses</h2>
<form method="POST" action="{{ route('hak.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Hak</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Guard Nama</label>
        <input type="text" name="guard_nama" class="form-control" value="web" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('hak.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
