<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{

    protected $table = 'kendaraan';

    protected $fillable = ['nomor_polisi', 'merk', 'model', 'pelanggan_id'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
