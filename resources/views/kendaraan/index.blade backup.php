<!-- resources/views/kendaraan/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kendaraan</h1>
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">Tambah Kendaraan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nomor Polisi</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Pemilik</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kendaraan as $k)
            <tr>
                <td>{{ $k->nomor_polisi }}</td>
                <td>{{ $k->merk }}</td>
                <td>{{ $k->model }}</td>
                <td>{{ $k->pelanggan->nama }}</td>
                <td>
                    <a href="{{ route('kendaraan.show', $k->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('kendaraan.edit', $k->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST" style="display:inline;">
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