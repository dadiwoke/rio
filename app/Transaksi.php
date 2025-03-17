<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksi';

    protected $fillable = ['pelanggan_id', 'kendaraan_id', 'layanan_id', 'tanggal', 'total'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}