<?php

namespace App\Http\Controllers\Installments;

use App\Loan;
use App\Installment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Nexmo\Laravel\Facade\Nexmo;

class InstallmentController extends Controller
{
    /**
     * tampilkan seluruh data angsuran berdasarkan anggota atau semu anggota
     *
     */
    public function index()
    {
        $data = [
            'loans' => Loan::with('user','type')->where('terverifikasi', true)->get(),
        ];
        return view('installments.index', $data);
    }
    /**
     * tampilkan form create installments
     */
    public function create(Loan $loan)
    {
        $this->authorize('create', Loan::class);

        $data = [
            'loan'  => $loan,
            'angsuran_ke'   => $loan->installments()->count() + 1,
        ];

        return view('installments.create', $data);
    }
    /**
     * memasukan data angsuran kedalam database
     *
     */
    public function store(Loan $loan, Request $request)
    {
        $this->authorize('create', Loan::class);

        if($request->get('angsuran_ke') > $loan->lama_angsuran){
            flash('Mohon maaf angsuran tersebut sudah lunas dan tidak dapat diangsur kembali!')->error();
            return redirect()->route('installments.show', $loan->id);
        }

        Installment::create([
            'loan_id'   => $loan->id,
            'jumlah_bayar'  => $request->get('jumlah_angsuran'),
            'angsuran_ke'   => $request->get('angsuran_ke'),
            'tanggal_bayar' => now(),
        ]);

        Nexmo::message()->send([
            'to'   => '+62' . $loan->user->phone,
            'from' => 'KOPERASI TAMAN SISWA',
            'text' => 'Assallamuaikum wr.wb kami dari smk taman siswa ingin memberitahukan bahwa pengajuan pinjaman anda sudah kami setujui berikut ini adalah perinciannya'
                . 'Nama Peminjam ' . $loan->user->name
                . 'Jumlah Pembayaran ' . $loan->jumlah_bayar
                . 'Angsuran ke- ' . $request->get('angsuran_ke')
                . 'Tanggal Pembayaran ' . now()
                . 'terimakasih '
                . 'PENGURUS KOPERASI TAMAN SISWA'
        ]);
        flash('Angsuran anda berhasil disimpan')->success();
        return redirect()->route('installments.show', $loan->id);
    }
    /**
     * tampilkan data angsuran per-user
     *
     * @param Type $var
     */
    public function show(Loan $loan)
    {
        $this->authorize('show', $loan);
        return view('installments.show', compact('loan'));
    }
}
