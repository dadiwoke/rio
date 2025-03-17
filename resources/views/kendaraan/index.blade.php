@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kendaraan</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Kendaraan</button>

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
                    <button class="btn btn-info btn-detail" data-id="{{ $k->id }}">Detail</button>
                    <button class="btn btn-warning btn-edit" data-id="{{ $k->id }}">Edit</button>
                    <button class="btn btn-danger btn-delete" data-id="{{ $k->id }}">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- MODAL TAMBAH KENDARAAN --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formAdd">
                    @csrf
                    <div class="form-group">
                        <label>Nomor Polisi</label>
                        <input type="text" name="nomor_polisi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" name="merk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pemilik</label>
                        <select name="pelanggan_id" class="form-control" required>
                            @foreach($pelanggan as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL DETAIL --}}
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

{{-- MODAL EDIT --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

{{-- SCRIPT AJAX --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Tambah Kendaraan
    $('#formAdd').submit(function(e) {
        e.preventDefault();
        $.post("{{ route('kendaraan.store') }}", $(this).serialize(), function() {
            alert("Data berhasil ditambahkan!");
            location.reload();
        });
    });

    // Edit Kendaraan
    $('.btn-edit').click(function() {
        let id = $(this).data('id');
        $.get('/kendaraan/' + id + '/edit', function(data) {
            $('#editModal .modal-body').html(data);
            $('#editModal').modal('show');
        });
    });

    // Detail Kendaraan
    $('.btn-detail').click(function() {
        let id = $(this).data('id');
        $.get('/kendaraan/' + id, function(data) {
            $('#detailModal .modal-body').html(data);
            $('#detailModal').modal('show');
        });
    });

    // Hapus Kendaraan
    $('.btn-delete').click(function() {
        let id = $(this).data('id');
        if(confirm("Apakah Anda yakin ingin menghapus kendaraan ini?")) {
            $.ajax({
                url: '/kendaraan/' + id,
                type: 'DELETE',
                data: { "_token": "{{ csrf_token() }}" },
                success: function() {
                    alert("Data berhasil dihapus!");
                    location.reload();
                }
            });
        }
    });
});
</script>

@endsection
