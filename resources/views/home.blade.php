@extends('layouts.app')

@section('content')

        <div class="col-md-12">
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
                    <path fill="#ffffff"
                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 5h2v6H9V5zm0 8h2v2H9v-2z" />
                </svg>
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Hello</h6>
                    <small class="text-white">{{Auth::user()->name}}</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <span >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="text-muted">
                            <path fill="#546e7a"
                                  d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                        </svg>
                    </span>

                    Total Simpanan
                </div>
                <div class="card-body">
                    @role('anggota')
                        <h4>
                            Rp.{{number_format(auth()->user()->totalSaldo(), 2)}}
                        </h4>
                    @else
                        <h4>
                            Rp.{{number_format($savings->sum('saldo'), 2)}}
                        </h4>
                    @endrole
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="text-muted">
                        <path fill="#546e7a" d="M4 18h12V6h-4V2H4v16zm-2 1V0h12l4 4v16H2v-1z" />
                    </svg>
                    Data Pinjaman
                </div>

                <div class="card-body">
                    @role('anggota')
                        <h4>
                            {{auth()->user()->dataPinjaman()->count()}}
                        </h4>
                    @else
                        <h4>
                            {{$pengajuan->where('terverifikasi', true)->count()}}
                        </h4>
                    @endrole
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="text-muted">
                        <path fill="#546e7a" d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                    </svg>
                    Total Pinjaman
                </div>

                <div class="card-body">
                    @role('anggota')
                        <h4>
                            Rp.{{number_format(auth()->user()->totalPinjaman(), 2)}}
                        </h4>
                    @else
                        <h4>
                            Rp.{{number_format($pengajuan->where('terverifikasi', true)->sum('jumlah_pinjaman'), 2)}}
                        </h4>
                    @endrole
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="text-muted">
                        <path fill="#546e7a"
                            d="M9 10V8h2v2h2v2h-2v2H9v-2H7v-2h2zm-5 8h12V6h-4V2H4v16zm-2 1V0h12l4 4v16H2v-1z" />
                    </svg>
                    Pengajuan Pinjaman
                </div>

                <div class="card-body">
                    @role('anggota')
                        <h4>
                            {{auth()->user()->pengajuanPinjaman()->count()}}
                        </h4>
                    @else
                        <h4>
                            {{$pengajuan->where('terverifikasi', false)->count()}}
                        </h4>
                    @endrole
                </div>
            </div>
        </div>
@endsection
