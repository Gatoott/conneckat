<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\kelas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'no_wa' => 'required|digits_between:10,13|starts_with:08,628',
            'id_eskul' => 'required',
            'alasan' => 'required',
            'kesiapan' => 'required',
            'pengalaman' => 'required',
        ]);

        Pendaftaran::create([
            'id_eskul' => $request->id_eskul,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'no_wa' => $request->no_wa,
            'alasan' => $request->alasan,
            'kesiapan' => $request->kesiapan,
            'pengalaman' => $request->pengalaman,
        ]);

        return redirect()->back()->with('berhasil', 'berhasil mendaftar eskul');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pendaftar)
    {
        $pendaftar = Pendaftaran::findOrFail($id_pendaftar);

        $pendaftar->delete();

        return redirect()->back()->with('berhasil', 'Berhasil menghapus data pendaftar!');
    }
}
