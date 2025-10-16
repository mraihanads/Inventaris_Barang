@extends('layouts.app')
@section('title','Edit Peran')

@section('content')
<h2>Edit Peran</h2>
<form method="POST" action="{{ route('peran.update',$peran->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Peran</label>
        <input type="text" name="nama" value="{{ $peran->nama }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Guard Nama</label>
        <input type="text" name="guard_nama" value="{{ $peran->guard_nama }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('peran.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
