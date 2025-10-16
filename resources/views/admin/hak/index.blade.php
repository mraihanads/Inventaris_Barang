@extends('layouts.app')
@section('title','Data Hak Akses')

@section('content')
<h2>Data Hak Akses</h2>
<a href="{{ route('hak.create') }}" class="btn btn-primary mb-3">Tambah Hak Akses</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Hak</th><th>Guard</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hak as $h)
        <tr>
            <td>{{ $h->nama }}</td>
            <td>{{ $h->guard_nama }}</td>
            <td>
                <a href="{{ route('hak.show',$h->id) }}" class="btn btn-info btn-sm">Lihat</a>
                <a href="{{ route('hak.edit',$h->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('hak.destroy',$h->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
