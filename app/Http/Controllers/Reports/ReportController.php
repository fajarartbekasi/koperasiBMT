<?php

namespace App\Http\Controllers\Reports;

use PDF;
use App\User;
use App\Saving;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function savings()
    {
        $this->authorize('cetak', Saving::class);

        $users = User::role('anggota')->with('tabungans')->get();

        $pdf = PDF::loadView('cetak.savings', compact('users'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_simpanan.pdf');
    }
}
