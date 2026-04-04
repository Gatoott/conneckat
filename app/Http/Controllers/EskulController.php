<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eskul_list = Eskul::all();
        $kelas_list = kelas::all();

        return view('index', compact('eskul_list', 'kelas_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if(!$user) {
            return view('/login');
        }

        if($user->role != 'admin') {
            return view('/');
        }

        $request->validate([
            'nama_eskul' => 'required',
            'kategori' => 'required',
            'slogan' => 'required',
            'deskripsi' => 'required',
            'nama_pembina' => 'required',
            'jadwal' => 'required',
            'tempat' => 'required',
            'id_pemegang' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto = $request->file('foto');

        $file_foto = time(). '-' . $foto->getClientOriginalName();
        
        $foto->move(public_path('uploads'), $file_foto);

        $eskul = Eskul::create([
            'nama_eskul' => $request->nama_eskul,
            'kategori' => $request->kategori,
            'slogan' => $request->slogan,
            'deskripsi' => $request->deskripsi,
            'nama_pembina' => $request->nama_pembina,
            'jadwal' => $request->jadwal,
            'tempat' => $request->tempat,
            'id_pemegang' => $request->id_pemegang,
            'foto' => $file_foto,
        ]);

        if(!$eskul) {
            return redirect()->back()->with('gagal', 'Gagal membuat eskul');
        }
        return redirect()->back()->with('berhasil', 'Berhasil membuat eskul');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_eskul)
    {
        $eskul = Eskul::findOrFail($id_eskul);

        $request->validate([
            'nama_eskul' => 'required',
            'kategori' => 'required',
            'slogan' => 'required',
            'deskripsi' => 'required',
            'nama_pembina' => 'required',
            'jadwal' => 'required',
            'tempat' => 'required',
            'id_pemegang' => 'required',
        ]);

        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $file_foto = time(). '-' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads'), $file_foto);

            $eskul->foto = $file_foto;
        }

        $eskul->update([
            'nama_eskul' => $request->nama_eskul,
            'kategori' => $request->kategori,
            'slogan' => $request->slogan,
            'deskripsi' => $request->deskripsi,
            'nama_pembina' => $request->nama_pembina,
            'jadwal' => $request->jadwal,
            'tempat' => $request->tempat,
            'id_pemegang' => $request->id_pemegang,
        ]);

        return redirect()->back()->with('berhasil', 'Berhasil mengedit eskul!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_eskul)
    {
        $eskul = Eskul::findOrFail($id_eskul);

        $eskul->delete();

        return redirect()->back()->with('berhasil', 'Berhasil mengahapus Eskul');
    }
}
