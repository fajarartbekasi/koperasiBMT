@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-secondary rounded shadow-sm d-flex align-items-center p-3 my-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
                    <path fill="#ffffff"
                        d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
                </svg>
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Data penarikan</h6>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @role('bendahara')
                        <div class="mb-2">
                            <a href="{{route('savings.anggota')}}" class="btn btn-info ">Tambah penarikan</a>
                        </div>
                    @endrole
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Total penarikan</th>
                                    <th>Saldo Akhir</th>
                                    @role('bendahara')
                                        <th>Options</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaksi)
                                    <tr>
                                        <td>{{$transaksi->tabungan->user->name}}</td>
                                        <td>{{$transaksi->total}}</td>
                                        <td>{{$transaksi->tabungan->saldo}}</td>
                                        @role('bendahara')
                                            <td>
                                                <a href="{{route('transaksi.cetak-bukti', $transaksi->id)}}" class="btn btn-info btn-sm">Cetak Bukti</a>
                                            </td>
                                        @endrole
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
