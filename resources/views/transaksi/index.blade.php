@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Transaksi Terkini</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Pelanggan</th>
                        <th>Kendaraan</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $t)
                    <tr>
                        <td>{{ $t->pelanggan->nama }}</td>
                        <td>{{ $t->kendaraan->nomor_polisi }}</td>
                        <td>{{ $t->layanan->nama }}</td>
                        {{-- <td>{{ $t->tanggal->format('d M Y') }}</td> --}}
                        <td>{{ $t->tanggal}}</td>
                        <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
