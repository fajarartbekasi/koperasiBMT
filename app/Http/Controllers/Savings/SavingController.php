<?php

namespace App\Http\Controllers\Savings;

use App\User;
use App\Tabungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SavingController extends Controller
{
    public function index()
    {
        $users = Tabungan::with('user')->latest()->paginate(5);

        return view('savings.index', compact('users'));
    }

    public function create()
    {


        $roles = User::all();
        return view('savings.create',compact('roles'));
    }

    public function store(Request $request)
    {

        Tabungan::create([
            'user_id'   => request('user_id'),
            'saldo'     => request('saldo')
        ]);

        flash('Tabungan anda berhasil ditambahkan.')->success();

        return redirect()->route('savings');
    }
    public function edit($id)
    {
        $saving = Tabungan::findOrFail($id);

        return view('savings.edit', compact('saving'));
    }
    public function update(Request $request, $id)
    {
        $saving = Tabungan::findOrFail($id);

        $saving->update($request->all());

        flash('Tabungan anda berhasil ditambahkan.')->success();

        return redirect()->route('savings');
    }
}
