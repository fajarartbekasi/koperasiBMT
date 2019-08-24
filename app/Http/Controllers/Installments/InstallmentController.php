<?php

namespace App\Http\Controllers\Installments;

use App\Loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstallmentController extends Controller
{
    public function index()
    {
        $data = [
            'loans' => Loan::with('user','type')->where('terverifikasi', true)->get(),
        ];
        return view('installments.index', $data);
    }
}
