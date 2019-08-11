<?php

namespace App\Http\Controllers\Loans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loan;

class LoanController extends Controller
{
    /**
     * menampilkan data pinjaman
     *
     */
    public function index()
    {
        $data = [
            'loans' => Loan::with('user','type')->where('terverifikasi', true)->get(),
        ];
       return view('loans.index', $data);
    }
}
