@extends('layouts.app')
@section('title','Edit Perolehan')

@section('content')
<h2>Edit Perolehan</h2>
<form method="POST" action="{{ route('perolehan.update',$perolehan->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $perolehan->nama }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $perolehan->deskripsi }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('perolehan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
