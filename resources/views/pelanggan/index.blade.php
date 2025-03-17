<!-- resources/views/pelanggan/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pelanggan</h1>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggan as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->telepon }}</td>
                <td>
                    <a href="{{ route('pelanggan.show', $p->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
