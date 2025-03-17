<!-- resources/views/kendaraan/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kendaraan</h1>
    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomor_polisi">Nomor Polisi</label>
            <input type="text" name="nomor_polisi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pelanggan_id">Pemilik</label>
            <select name="pelanggan_id" class="form-control" required>
                @foreach($pelanggan as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection