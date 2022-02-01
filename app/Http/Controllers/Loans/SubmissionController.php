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

        Nexmo::message()->send([
            'to'   => '+62' . $loan->user->phone,
            'from' => 'KOPERASI TAMAN SISWA',
            'text' => 'Assallamuaikum wr.wb kami dari smk taman siswa ingin memberitahukan bahwa pengajuan pinjaman anda sudah kami setujui berikut ini adalah perinciannya'
                . 'Nama Peminjam ' . $loan->user->name
                . 'Jumlah Pinjaman ' . $loan->jumlah_pinjaman
                . 'Jumlah Angsuran ' . $loan->jumlah_angsuran
                . 'Lama Angsuran ' . $loan->lama_angsuran
                . 'Tanggal Angsuran ' . $loan->created_at->format('Y-m-d')
                . 'terimakasih '
                . 'PENGURUS KOPERASI TAMAN SISWA'
        ]);
        flash('Pengajuan pinjaman berhasil di ajukan')->success();

        return redirect()->route('submissions');
    }
}
