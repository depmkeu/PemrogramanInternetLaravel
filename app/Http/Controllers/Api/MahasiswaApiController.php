<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaApiController extends Controller
{
    public function index()
    {
        return response()->json(Mahasiswa::all());
    }

    public function show($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return response()->json($mhs);
    }

    public function store(Request $request)
    {
        $mhs = Mahasiswa::create($request->all());
        return response()->json($mhs, 201);
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->all());
        return response()->json($mhs);
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return response()->json(['message' => 'Data deleted']);
    }
}
