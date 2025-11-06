<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan daftar mahasiswa (dengan relasi fakultas & prodi)
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['programStudi.fakultas'])
            ->orderBy('id', 'desc')
            ->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Form tambah mahasiswa
     */
    public function create()
    {
        $fakultas = Fakultas::orderBy('nama_fakultas')->get();
         $programstudi = ProgramStudi::orderBy('nama_program_studi')->get();
        return view('mahasiswa.create', compact('fakultas', 'programstudi'));
    }

    /**
     * Simpan data mahasiswa baru
     */
    public function store(Request $request)
    {

        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|min:4',
            'nama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id',
            'program_studi_id' => 'required|exists:program_studis,id',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'fakultas_id' => $request->fakultas_id,
            'program_studi_id' => $request->program_studi_id,
        ]);

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil disimpan.');
    }

    /**
     * Form edit mahasiswa
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $fakultas = Fakultas::orderBy('nama_fakultas')->get();
        $programstudi = ProgramStudi::where('fakultas_id', $mahasiswa->fakultas_id)
            ->orderBy('nama_prodi')
            ->get();

        return view('mahasiswa.edit', compact('mahasiswa', 'fakultas', 'programstudi'));
    }

    /**
     * Update data mahasiswa
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id',
            'program_studi_id' => 'required|exists:program_studis,id',
        ]);

        $mahasiswa->update($request->only('nim', 'nama', 'fakultas_id', 'program_studi_id'));

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Hapus data mahasiswa
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }

    /**
     * Ambil daftar Program Studi berdasarkan Fakultas (AJAX)
     */
    public function getProgramStudi($fakultas_id)
    {
        $prodi = ProgramStudi::where('fakultas_id', $fakultas_id)
            ->orderBy('nama_prodi')
            ->get();

        return response()->json($prodi);
    }
}
