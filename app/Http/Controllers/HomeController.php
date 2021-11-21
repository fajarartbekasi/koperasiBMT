<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Penarikan;
use App\Tabungan;
use App\Loan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'pengajuan' => Loan::with('user')->where('user_id', Auth::user()->id),
            'savings'   => Tabungan::with('user')->where('user_id', Auth::user()->id),
            'penarikan'   => Tabungan::with('penarikans')->where('user_id', Auth::user()->id)->count(),
        ];

        return view('home', $data);
    }
}
