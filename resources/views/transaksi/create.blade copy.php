<!-- resources/views/transaksi/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pelanggan_id">Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                @foreach($pelanggan as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kendaraan_id">Kendaraan</label>
            <select name="kendaraan_id" class="form-control" required>
                @foreach($kendaraan as $k)
                <option value="{{ $k->id }}">{{ $k->nomor_polisi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="layanan_id">Layanan</label>
            <select name="layanan_id" class="form-control" required>
                @foreach($layanan as $l)
                <option value="{{ $l->id }}">{{ $l->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection