<?php

namespace App\Http\Controllers\Loans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loan;

class SubmissionController extends Controller
{

    public function index()
    {
        $submissions = Loan::with('user','type')->where('terverifikasi', false)->get();

        return view('submissions.index', compact('submissions'));
    }
}
