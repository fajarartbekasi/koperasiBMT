<?php

namespace App\Http\Controllers\Savings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
use App\User;

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
}
