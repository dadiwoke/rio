<!-- resources/views/pelanggan/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pelanggan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama }}</h5>
            <p class="card-text">Alamat: {{ $pelanggan->alamat }}</p>
            <p class="card-text">Telepon: {{ $pelanggan->telepon }}</p>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection