@extends('layouts.app')
@section('title','Tambah Pengguna')

@section('content')
<h2>Tambah Pengguna</h2>
<form method="POST" action="{{ route('pengguna.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
