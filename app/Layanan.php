<?php

namespace App;
/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    /* use HasFactory; */
    protected $primaryKey = 'id';
    protected $table = 'layanan';

    protected $fillable = ['nama', 'harga'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}