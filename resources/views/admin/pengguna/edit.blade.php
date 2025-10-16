@extends('layouts.app')
@section('title','Edit Pengguna')

@section('content')
<h2>Edit Pengguna</h2>
<form method="POST" action="{{ route('pengguna.update',$pengguna->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $pengguna->nama }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $pengguna->email }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password (biarkan kosong jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
