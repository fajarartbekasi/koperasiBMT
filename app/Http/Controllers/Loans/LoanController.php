<?php

namespace App\Http\Controllers\Loans;

use PDF;
use App\Loan;
use App\Installment;
use App\Type;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function destroy(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);

        Nexmo::message()->send([
            'to'   => '+62' . $loan->user->phone,
            'from' => 'KOPERASI TAMAN SISWA',
            'text' => 'Assallamuaikum wr.wb kami dari smk taman siswa ingin memberitahukan bahwa pengajuan pinjaman anda tidak dapat kami setujui karena saldo anda kurang dari RP.2.000.000. terimakasih'
                       . 'KOPERASI TAMAN SISWA'
        ]);

        $loan->delete($request->all());
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

    public function cetak(Request $request)
    {
        $this->authorize('cetak', Loan::class);

        if($request->has('dari_tgl')){
            $loans = Loan::with('user','type')->whereBetWeen('tanggal_persetujuan',[request('dari_tgl'),
            request('sampai_tgl')])->get();
        }else{
            $loans = Loan::with('user','type')->where('terverifikasi', true)->get();
        }
        $pdf = PDF::loadView('cetak.loans', compact('loans'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_pinjaman.pdf');
    }
}
