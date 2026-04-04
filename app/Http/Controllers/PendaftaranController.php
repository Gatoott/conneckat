<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\kelas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id, $id_kelas)
    {
        $eskul = Eskul::findOrFail($id);
        $kelas = kelas::findOrFail($id_kelas);

        if(!$eskul) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'eskul tidak ditemukan'
            ], 404);
        }

        if(!$kelas) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'kelas tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama_siswa' => 'required',
            'alasan' => 'required'
        ]);

        Pendaftaran::create([
            'id_kelas' => $kelas->id_kelas,
            'id_eskul' => $eskul->id_eskul,
            'nama_siswa' => $request->nama_siswa,
            'alasan' => $request->alasan
        ]);

        return response()->json([
            'status' => 'berhasil',
            'pesan' => 'berhasil mendaftar'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
