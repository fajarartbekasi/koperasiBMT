<?php

namespace App\Http\Controllers\Installments;

use App\Loan;
use App\Installment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

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
