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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if($user->role != 'pembina') {
            return response()->json([
                'pesan' => 'anda bukan pembina eskul'
            ], 403);
        }

        $request->validate([
            'nama_eskul' => 'required',
            'slogan' => 'required',
            'deskripsi' => 'required',
            'pendaftaran' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'dokumentasi' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logo = $request->file('logo');
        $dokumentasi = $request->file('dokumentasi');

        $file_logo = time(). '-' . $logo->getClientOriginalName();
        $file_dokumentasi = time(). '-' . $dokumentasi->getClientOriginalName();
        
        $logo->move(public_path('uploads'), $file_logo);
        $dokumentasi->move(public_path('uploads'), $file_dokumentasi);

        $eskul = Eskul::create([
            'id_pemegang' => Auth::id(),
            'nama_eskul' => $request->nama_eskul,
            'slogan' => $request->slogan,
            'deskripsi' => $request->deskripsi,
            'logo' => $request->logo,
            'dokumentasi' => $request->dokumentasi,
            'pendaftaran' => $request->pendaftaran
        ]);

        return response()->json([
            'messagge' => 'Berhasil membuat eskul!',
            'data' => $eskul,
            'logo' => asset('uploads/'. $file_logo),
            'dokumentasi' => asset('uploads/'. $file_dokumentasi),
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Eskul $eskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eskul $eskul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eskul $eskul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eskul $eskul)
    {
        //
    }
}
