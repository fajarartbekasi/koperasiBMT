@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="40" height="40" class="mr-3">
                <path fill="#ffffff"
                    d="M2 6H0v2h2v2h2V8h2V6H4V4H2v2zm7 0a3 3 0 0 1 6 0v2a3 3 0 0 1-6 0V6zm11 9.14A15.93 15.93 0 0 0 12 13c-2.91 0-5.65.78-8 2.14V18h16v-2.86z" />
            </svg>
            <div class="lh-100">
                <h2 class="mb-0 text-white lh-100">{{ config('app.name', 'Laravel') }}</h2>
                <small class="text-white">Alamat koperasi :</small>
                <br>
            </div>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Angsuran Ke</th>
                        <th>Jumlah Bayar</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loan->installments as $angsuran)
                        <tr>
                            <td>{{$angsuran->angsuran_ke}}</td>
                            <td>Rp.{{number_format($angsuran->jumlah_bayar, 2)}}</td>
                            <td>{{$angsuran->tanggal_bayar}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada data angsuran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
