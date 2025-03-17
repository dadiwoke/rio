<!-- resources/views/layanan/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    @include('breadcrumb.breadcrumb')

    {{-- <h1>Daftar Layanan</h1> --}}
    <a href="{{ route('layanan.create') }}" class="btn btn-primary">Tambah Layanan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($layanan as $l)
            <tr>
                <td>{{ $l->nama }}</td>
                <td>{{ $l->harga }}</td>
                <td>
                    <a href="{{ route('layanan.show', $l->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('layanan.edit', $l->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('layanan.destroy', $l->id) }}" method="POST" style="display:inline;">
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
