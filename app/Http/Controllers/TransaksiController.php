<?php

namespace App\Http\Controllers;

use App\Tabungan;
use App\Penarikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = Penarikan::with('tabungan')->get();

        return view('transaksi.index', compact('transactions'));
    }
    public function edit($id)
    {
        $saving = Tabungan::findOrFail($id);

        return view('transaksi.edit', compact('saving'));
    }
    public function store(Request $request, $id)
    {
            $saving = Tabungan::findOrFail($id);

            $penarikan = Penarikan::create($request->all());
            if($penarikan->save()){
                $hitung = $saving->saldo - $penarikan->total;

                $saving->update([
                    'saldo' => $hitung,
                ]);
            }
            flash('Transaksi pengembalian berhasil dilakukan');
            return redirect()->route('savings');
    }
}
