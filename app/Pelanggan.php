<?php

namespace App;
/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    /* use HasFactory; */

    protected $table = 'pelanggan';

    protected $fillable = ['nama', 'alamat', 'telepon'];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
