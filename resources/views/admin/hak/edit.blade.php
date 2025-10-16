@extends('layouts.app')
@section('title','Edit Hak Akses')

@section('content')
<h2>Edit Hak Akses</h2>
<form method="POST" action="{{ route('hak.update',$hak->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Hak</label>
        <input type="text" name="nama" value="{{ $hak->nama }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Guard Nama</label>
        <input type="text" name="guard_nama" value="{{ $hak->guard_nama }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('hak.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
