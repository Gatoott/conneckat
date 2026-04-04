<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        $regis = User::create([
            'username' => $validated["username"],
            'password' => bcrypt($validated["password"]),
        ]);

        if($regis){
            return response()->json([
                'status' => 'berhasil',
                'pesan' => 'berhasil register',
            ], 200);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!Auth::attempt($validated)){
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'username atau password salah!',
            ],401);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'status' => 'berhasil',
            'pesan' => 'berhasil login!',
            'token' => $token
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $login = Auth::user();
            if($login->role != "admin") {
                return response()->json([
                'status' => 'gagal',
                'pesan' => 'anda bukan admin!',
            ], 401);
        }

        $request->validate([
            'username' => 'required|unique:users, username',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json([
            'status' => 'berhasil',
            'pesan' => 'berhasil membuat akun!',
            'data' => $user,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
