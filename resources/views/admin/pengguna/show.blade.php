@extends('layouts.app')
@section('title','Detail Pengguna')

@section('content')
<h2>Detail Pengguna</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>Nama:</strong> {{ $pengguna->nama }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $pengguna->email }}</li>
</ul>
<a href="{{ route('pengguna.index') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection
