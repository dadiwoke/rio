<!-- resources/views/transaksi/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>Kendaraan</th>
                <th>Layanan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $t)
            <tr>
                <td>{{ $t->pelanggan->nama }}</td>
                <td>{{ $t->kendaraan->nomor_polisi }}</td>
                <td>{{ $t->layanan->nama }}</td>
                <td>{{ $t->tanggal }}</td>
                <td>{{ $t->total }}</td>
                <td>
                    <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" style="display:inline;">
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
