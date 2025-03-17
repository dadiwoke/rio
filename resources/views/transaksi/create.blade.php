@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>

    <!-- Notification Area -->
    <div id="notification" class="alert alert-success d-none" role="alert">
        Transaksi berhasil disimpan!
    </div>

    <form id="transaksiForm" action="{{ route('transaksi.store') }}" method="POST">
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

<!-- JavaScript to handle the form submission and display notification -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle form submission with AJAX
        $('#transaksiForm').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Show success notification
                    $('#notification').removeClass('d-none');

                    // Optionally, clear the form
                    $('#transaksiForm')[0].reset();

                    // Redirect to the transaksi list after 1 seconds
                    setTimeout(function () {
                        window.location.href = '{{ route('transaksi.index') }}';
                    }, 1000);
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan, coba lagi.');
                }
            });
        });
    });
</script>

@endsection
