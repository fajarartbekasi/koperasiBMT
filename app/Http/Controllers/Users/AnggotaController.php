<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AnggotaController extends Controller
{
    /**
     * New AnggotaController instance.
     */
    public function __construct()
    {
        $this->middleware(['role:bendahara']);
    }
    /**
     * Mengambil data pengguna dengan akses anggota.
     */
    public function index()
    {
        $anggotas = User::role('anggota')->get();

        return view('users.anggota.index', compact('anggotas'));
    }
    /**
     * Menampilkan formulir anggota baru.
     */
    public function create()
    {
        $roles = Role::whereIn('name', ['anggota'])->get();

        return view('users.anggota.create', compact('roles'));
    }
}
