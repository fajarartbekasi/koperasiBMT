<?php

namespace App\Http\Controllers\Loans;

use App\Loan;
use App\Installment;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function create(Type $type)
    {
        return view('loans.create', compact('type'));
    }
    /**
     * kirim data pinjaman kedalam database
     *
     * @param Type $type
     * @param Request $request
     * @return void
     */
    public function store(Type $type, Request $request)
    {
        Loan::create([
                'user_id'       => auth()->user()->id,
                'type_id'       => $type->id,
                'jumlah_pinjaman'   => $request->jumlah_pinjaman,
                'jumlah_angsuran'   => $request->jumlah_angsuran,
                'lama_angsuran'     => $request->lama_angsuran,
                'tanggal_pengajuan'   => now(),
            ]);

        flash('Pinjaman berhasil di setujui')->success();

        return redirect()->route('submissions');
    }
    /**
     * tolak pengajuan pinjaman.
     *
     * @param Loan $loan
     * @return void
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        flash('Pengajuan pinjaman berhasil ditolak');

        return redirect()->route('submissions');
    }
    /**
     * hitung kalkulasi
     *
     * @param Type $type
     * @param Request $request
     * @return void
     */
    public function kalkulasi(Type $type, Request $request)
    {
        $request->validate([
            'jumlah_pinjaman' => 'required|numeric|gte:minimum_jumlah_pinjaman|lte:maksimum_jumlah_pinjaman',
            'lama_angsuran'   => 'required|numeric|gte:minimum_lama_angsuran|lte:maksimum_lama_angsuran',
        ]);


       $persen = $type->bunga / 100;
       $cicilan_pokok = $request->jumlah_pinjaman / $request->lama_angsuran;
       $bunga = $request->jumlah_pinjaman * $persen / $request->lama_angsuran;
       $angsuran = $cicilan_pokok + $bunga;

       return view('loans.kalkulasi', compact('type','request','angsuran'));
    }
}
