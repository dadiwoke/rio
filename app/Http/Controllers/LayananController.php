<?php

namespace App\Http\Controllers;
use App\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        Layanan::create($request->all());
        return redirect()->route('layanan.index');
    }

    /* public function show(Layanan $layanan)
    {
        return view('layanan.show', compact('layanan'));
    } */
    public function show($id)
    {
        $layanan = Layanan::findOrFail($id);
        return response()->json($layanan);
    }


    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $id)
    {
        $id->update($request->all());
        return redirect()->route('layanan.index');
    }

    public function destroy(Layanan $id)
    {
        $id->delete();
        return redirect()->route('layanan.index');
    }
}
