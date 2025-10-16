@extends('layouts.app')
@section('title','Data Pengguna')

@section('content')
<h2>Data Pengguna</h2>
<a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th><th>Email</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengguna as $u)
        <tr>
            <td>{{ $u->nama }}</td>
            <td>{{ $u->email }}</td>
            <td>
                <a href="{{ route('pengguna.show',$u->id) }}" class="btn btn-info btn-sm">Lihat</a>
                <a href="{{ route('pengguna.edit',$u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pengguna.destroy',$u->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
