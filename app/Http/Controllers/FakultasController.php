<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::orderBy('id','desc')->get();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required'
        ]);

        Fakultas::create($request->only('nama_fakultas'));

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan.');
    }

    public function edit(Fakultas $fakulta)
    {
        return view('fakultas.edit', ['fakultas' => $fakulta]);
    }

    public function update(Request $request, Fakultas $fakulta)
    {
        $request->validate([
            'nama_fakultas' => 'required'
        ]);

        $fakulta->update($request->only('nama_fakultas'));

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui.');
    }

    public function destroy(Fakultas $fakulta)
    {
        $fakulta->delete();

        return redirect()->route('fakultas.index')->with('success', 'Fakultas dihapus.');
    }
}
