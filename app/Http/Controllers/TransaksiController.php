<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Pelanggan;
use App\Kendaraan;
use App\Layanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['pelanggan', 'kendaraan', 'layanan'])->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::all();
        $layanan = Layanan::all();
        return view('transaksi.create', compact('pelanggan', 'kendaraan', 'layanan'));
    }

    public function store(Request $request)
    {
        Transaksi::create($request->all());
        return redirect()->route('transaksi.index');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::all();
        $layanan = Layanan::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggan', 'kendaraan', 'layanan'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
