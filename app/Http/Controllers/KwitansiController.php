<?php

namespace App\Http\Controllers;

use PDF;
use App\Penarikan;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    public function show($id)
    {
        $penarikan = Penarikan::findOrFail($id);

        $pdf = PDF::loadView('transaksi.kwitansi', compact('penarikan'))->setPaper('a5', 'potrait');

        return $pdf->stream('kwitansi.pdf');
    }
}
