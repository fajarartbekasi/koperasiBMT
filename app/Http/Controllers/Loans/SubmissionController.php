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
        $loan->update([
            'terverifikasi'         => true,
            'tanggal_persetujuan'   => now(),
        ]);

        flash('Pengajuan pinjaman berhasil di ajukan')->success();

        return redirect()->route('submissions');
    }
}
