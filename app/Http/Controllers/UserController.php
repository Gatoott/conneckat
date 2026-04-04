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

        Auth::login($regis);

        return redirect('/')->with('berhasil', 'Berhasil register');
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

        if(Auth::attempt($validated)) {
            return redirect('/');
        }

        return back()->with('error', 'Username atau password salah!')->withInput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $login = Auth::user();
        if($login->role != "admin") {
            return redirect('/');
        }

        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'pembina',
        ]);

        return redirect()->back()->with('berhasil', 'berhasil membuat akun pembina');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
           
    }
}
