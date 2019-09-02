<?php

namespace App\Http\Controllers\Loans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loan;
use Nexmo\Laravel\Facade\Nexmo;

class SubmissionController extends Controller
{

    public function index()
    {
        $submissions = Loan::with('user','type')->where('terverifikasi', false)->get();

        return view('submissions.index', compact('submissions'));
    }

    /**
     * setujui peminjamnan
     *
     * @param Loan $loan
     * @param Request $request
     */
    public function store(Loan $loan, Request $request)
    {
        // $loan->update([
        //     'terverifikasi'         => true,
        //     'tanggal_persetujuan'   => now(),
        // ]);

       $sms =    Nexmo::message()->send(
                    [
                        'to'    => '+62' . $request->phone,
                        'from'  => 'Koperasi BMT',
                        'text'  => 'Selamat pengajuan pinjaman anda kami terima',
                    ]
                );

            dd($sms);

        flash('Pengajuan pinjaman berhasil di setujui')->success();

        return redirect()->route('submissions');
    }
}
