@extends('layouts.app')
@section('title','Data Peran')

@section('content')
<h2>Data Peran</h2>
<a href="{{ route('peran.create') }}" class="btn btn-primary mb-3">Tambah Peran</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Peran</th><th>Guard</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peran as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->guard_nama }}</td>
            <td>
                <a href="{{ route('peran.show',$p->id) }}" class="btn btn-info btn-sm">Lihat</a>
                <a href="{{ route('peran.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('peran.destroy',$p->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
