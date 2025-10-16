@extends('layouts.app')
@section('title','Detail Hak Akses')

@section('content')
<h2>Detail Hak Akses</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>Nama Hak:</strong> {{ $hak->nama }}</li>
    <li class="list-group-item"><strong>Guard:</strong> {{ $hak->guard_nama }}</li>
</ul>
<a href="{{ route('hak.index') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection
