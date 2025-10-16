@extends('layouts.app')
@section('title','Data Lokasi')

@section('content')
<h2>Data Lokasi</h2>
<a href="{{ route('lokasi.create') }}" class="btn btn-primary mb-3">Tambah Lokasi</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th><th>Deskripsi</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lokasi as $l)
        <tr>
            <td>{{ $l->nama }}</td>
            <td>{{ $l->deskripsi }}</td>
            <td>
                <a href="{{ route('lokasi.show',$l->id) }}" class="btn btn-info btn-sm">Lihat</a>
                <a href="{{ route('lokasi.edit',$l->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('lokasi.destroy',$l->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
