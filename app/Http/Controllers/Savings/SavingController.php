<?php

namespace App\Http\Controllers\Savings;

use App\User;
use App\Saving;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SavingController extends Controller
{
    public function index()
    {
        $users = User::role('anggota')->get();

        return view('savings.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', Saving::class);

        return view('savings.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Saving::class);

        $users = User::role('anggota')->get();

        foreach($users as $anggota){
            Saving::create([
                'user_id'   => $anggota->id,
                'saldo'     => request('saldo')
            ]);

            flash('Tabungan anda berhasil ditambahkan.')->success();

            return redirect()->route('savings.index');
        }
    }
}
