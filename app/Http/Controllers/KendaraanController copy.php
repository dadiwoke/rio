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
        return view('kendaraan.index', compact('kendaraan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('kendaraan.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        Kendaraan::create($request->all());
        return redirect()->route('kendaraan.index');
    }

    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    public function edit(Kendaraan $kendaraan)
    {
        $pelanggan = Pelanggan::all();
        return view('kendaraan.edit', compact('kendaraan', 'pelanggan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $kendaraan->update($request->all());
        return redirect()->route('kendaraan.index');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index');
    }
}