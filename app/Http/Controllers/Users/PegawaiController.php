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
        $this->middleware(['role:sekretaris|ketua','verified']);
    }

    public function index()
    {
        $pegawais = User::role(['ketua','bendahara','sekretaris'])->get();

        return view('users.pegawai.index', compact('pegawais'));
    }
}
