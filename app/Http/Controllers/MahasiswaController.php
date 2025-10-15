<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('id','desc')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Simpan mahasiswa baru ke DB
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        Mahasiswa::create($request->only('nim','nama','prodi'));

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa disimpan.');
    }

    // Menampilkan form edit mahasiswa
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Update mahasiswa
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id . '|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        $mahasiswa->update($request->only('nim','nama','prodi'));

        return redirect()->route('mahasiswa.index')->with('success','Data mahasiswa diperbarui.');
    }

    // Hapus mahasiswa
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa berhasil dihapus.');
    }
}
