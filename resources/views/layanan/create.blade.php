<!-- resources/views/layanan/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Layanan</h1>
    <form action="{{ route('layanan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection