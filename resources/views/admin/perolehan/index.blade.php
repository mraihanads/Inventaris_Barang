@extends('layouts.app')
@section('title','Data Perolehan')

@section('content')
<h2>Data Perolehan</h2>
<a href="{{ route('perolehan.create') }}" class="btn btn-primary mb-3">Tambah Perolehan</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th><th>Deskripsi</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($perolehan as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->deskripsi }}</td>
            <td>
                <a href="{{ route('perolehan.show',$p->id) }}" class="btn btn-info btn-sm">Lihat</a>
                <a href="{{ route('perolehan.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('perolehan.destroy',$p->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
