@extends('layouts.app')
@section('title','Tambah Perolehan')

@section('content')
<h2>Tambah Perolehan</h2>
<form method="POST" action="{{ route('perolehan.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('perolehan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
