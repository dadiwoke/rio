<?php

namespace App\Http\Controllers;

use App\Kendaraan;
use App\Pelanggan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();
        $pelanggan = Pelanggan::all();
        return view('kendaraan.index', compact('kendaraan', 'pelanggan'));
    }

    public function store(Request $request)
    {
        Kendaraan::create($request->all());
        return response()->json(['message' => 'Kendaraan berhasil ditambahkan']);
    }

    public function show(Kendaraan $kendaraan)
    {
        return response()->json($kendaraan);
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $kendaraan->update($request->all());
        return response()->json(['message' => 'Kendaraan berhasil diperbarui']);
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return response()->json(['message' => 'Kendaraan berhasil dihapus']);
    }
}
