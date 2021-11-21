<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:bendahara','verified']);
    }

    public function index()
    {
        $pegawais = User::role(['ketua','bendahara'])->get();

        return view('users.pegawai.index', compact('pegawais'));
    }
    public function create()
    {
        $roles = Role::whereNotIn('name', ['anggota'])->get();

        return view('users.pegawai.create', compact('roles'));
    }
}
