<?php

namespace App\Http\Controllers\Report;

use PDF;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller
{
    public function moon(Request $request)
    {
        if ($request->has('tgl_awal')) {
            $users = User::whereBetween('created_at', [request('tgl_awal'), request('tgl_akhir')])
            ->get();
        }

        $pdf = PDF::loadView('cetak.anggota.moon', compact('users'))->setPaper('a3', 'landscape');

        return $pdf->stream('laporan_bulanan_anggota.pdf');
    }
    public function all()
    {
        $users= User::all();

        $pdf = PDF::loadView('cetak.anggota.all', compact('users'))->setPaper('a3', 'landscape');

        return $pdf->stream('laporan_all_anggota.pdf');
    }
}
