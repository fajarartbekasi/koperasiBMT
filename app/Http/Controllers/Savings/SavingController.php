<?php

namespace App\Http\Controllers\Savings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SavingController extends Controller
{
    public function index()
    {
        return view('savings.index');
    }

    public function create()
    {
        return view('savings.create');
    }
}
