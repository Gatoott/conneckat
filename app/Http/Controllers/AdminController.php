<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin() {
        $user = Auth::user();
        $role = $user->role;

        if (!$user) {
            return redirect('/login');
        }

        if($role !== 'admin' && $role !== 'pembina') {
            return redirect('/');
        }

        $query = DB::table('pendaftarans')
            ->join('eskuls', 'pendaftarans.id_eskul', '=', 'eskuls.id_eskul')
            ->join('kelas', 'pendaftarans.id_kelas', '=', 'kelas.id_kelas')
            ->select(
                'pendaftarans.*',
                'eskuls.nama_eskul',
                'kelas.nama_kelas'
            );

        if ($role !== 'admin') {
            $query->where('eskuls.id_pemegang', $user->id);
        }

        $pendaftar = $query->get();

        $pembina = DB::table('users')
                ->leftJoin('eskuls', 'users.id_user', '=', 'eskuls.id_pemegang')
                ->where('users.role', 'pembina')
                ->select('users.*','eskuls.*',)->get();

        return view('admin', compact('pendaftar', 'role', 'pembina'));
    }
    
}
