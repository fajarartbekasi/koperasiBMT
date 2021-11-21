<?php

namespace App\Http\Controllers;

use App\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::whereUserId(Auth::id())->with('penarikans')->get();

        return view('user.tabungan.index', compact('tabungans'));
    }
}
