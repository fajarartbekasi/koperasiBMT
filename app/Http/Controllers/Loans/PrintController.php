<?php

namespace App\Http\Controllers\Loans;

use App\Loan;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:bendahara|sekretaris');
    }

    public function show(Loan $loan)
    {
        if ($loan->terverifikasi == true) {
            abort(404);
        }

        $pdf = PDF::loadView('cetak.pengajuan', compact('loan'));

        return $pdf->stream('pengajuan.pdf');
    }
}
