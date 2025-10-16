@extends('layouts.app')
@section('title','Detail Peran')

@section('content')
<h2>Detail Peran</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>Nama Peran:</strong> {{ $peran->nama }}</li>
    <li class="list-group-item"><strong>Guard:</strong> {{ $peran->guard_nama }}</li>
</ul>
<a href="{{ route('peran.index') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection
