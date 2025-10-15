<?php 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
 
class MahasiswaDummyController extends Controller 
{ 
    // data dummy — dalam array 
    private $data = [ 
        1 => ['id'=>1, 'nim'=>'2305505001', 'nama'=>'Putu Agus', 'prodi'=>'Teknologi Informasi'], 
        2 => ['id'=>2, 'nim'=>'2305405001', 'nama'=>'Made Cenik', 'prodi'=>'Teknik Elektro'] 
    ]; 
 
    public function index() 
    { 
        $mahasiswa = $this->data; // nantinya dari DB 
        return view('mahasiswa_dummy.index', compact('mahasiswa')); 
    } 
 
    public function create() 
    { 
        return view('mahasiswa_dummy.create'); 
    } 
 
    public function store(Request $request) 
    { 
        // validasi sederhana 
        $request->validate([ 
            'nim' => 'required|min:4', 
            'nama' => 'required', 
            'prodi' => 'required' 
        ]); 
 
        // di implementasi tanpa DB -> redirect ke index dengan pesan 
        return redirect('/mahasiswa-dummy')->with('success', 'Mahasiswa berhasil ditambahkan (dummy).'); 
    } 
 
    public function edit($id) 
    { 
        $m = $this->data[$id] ?? null; 
        if (!$m) return redirect('/mahasiswa-dummy')->with('error','Mahasiswa tidak ditemukan'); 
        return view('mahasiswa_dummy.edit', compact('m')); 
    } 
 
    public function update(Request $request, $id) 
    { 
        $request->validate([ 
            'nim' => 'required|min:4', 
            'nama' => 'required', 
            'prodi' => 'required' 
        ]); 
        return redirect('/mahasiswa-dummy')->with('success', 'Data mahasiswa (dummy) berhasil 
diperbarui.'); 
    } 
}