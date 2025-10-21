<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $programstudi = ProgramStudi::with('fakultas')->orderBy('id', 'desc')->get();
        return view('programstudi.index', compact('programstudi'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('programstudi.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id'
        ]);

        ProgramStudi::create($request->only('nama_prodi', 'fakultas_id'));

        return redirect()->route('programstudi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    public function edit(ProgramStudi $programstudi)
    {
        $fakultas = Fakultas::all();
        return view('programstudi.edit', compact('programstudi', 'fakultas'));
    }

    public function update(Request $request, ProgramStudi $programstudi)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id'
        ]);

        $programstudi->update($request->only('nama_prodi', 'fakultas_id'));

        return redirect()->route('programstudi.index')->with('success', 'Program Studi diperbarui.');
    }

    public function destroy(ProgramStudi $programstudi)
    {
        $programstudi->delete();

        return redirect()->route('programstudi.index')->with('success', 'Program Studi dihapus.');
    }
}
