@extends('layouts.app')

@section('content')
<div class="container">
    @include('breadcrumb.breadcrumb')

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
                    <a href="javascript:void(0)" class="btn btn-warning editLayananBtn" data-id="{{ $l->id }}">Edit</a>
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

<!-- Modal Edit Layanan -->
<div class="modal fade" id="editLayananModal" tabindex="-1" role="dialog" aria-labelledby="editLayananModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLayananModalLabel">Edit Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editLayananForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="layanan_id">

                    <div class="form-group">
                        <label for="nama">Deskripsi</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Script AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Saat tombol Edit diklik
        $('.editLayananBtn').click(function () {
            var layananId = $(this).data('id');

            // Ambil data layanan via AJAX
            $.get('/layanan/' + layananId, function (data) {
                $('#layanan_id').val(data.id);
                $('#nama').val(data.nama);
                $('#harga').val(data.harga);
                $('#editLayananModal').modal('show');
            });
        });

        // Saat form Edit disubmit
        $('#editLayananForm').submit(function (e) {
            e.preventDefault();

            var layananId = $('#layanan_id').val();
            var formData = {
                _token: $('input[name=_token]').val(),
                _method: 'PUT',
                nama: $('#nama').val(),
                harga: $('#harga').val()
            };

            // Kirim update via AJAX
            $.ajax({
                url: '/layanan/' + layananId,
                type: 'POST',
                data: formData,
                success: function (response) {
                    alert('Layanan berhasil diperbarui!');
                    location.reload(); // Refresh halaman
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan, coba lagi.');
                }
            });
        });
    });
</script>
@endsection
