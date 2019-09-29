@extends('layouts.app')

@section('pengajuan_pinjaman', 'm-menu__item--active')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body rounded-lg">
                    <h5 class="text-muted text-center mb-3">Kalkulasi pinjaman anda</h5>
                    <div class="d-flex justify-content-center mb-5">
                        <div class="alert alert-info" role="alert">
                            Jenis Pinjaman
                            <strong class="text-danger">
                                {{ $type->nama_jenis_pinjaman }}
                            </strong>
                            dengan
                            Bunga
                            <strong class="text-danger">
                                {{ $type->bunga }}%
                            </strong>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('loans.store', $type->id) }}">
                        @csrf
                        <label for="show_jp" class="text-muted">Jumlah pinjaman</label>
                        <div class="input-group mb-4 shadow-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"
                                        class="mr-2zZZZ">
                                        <path fill="#eeeeee"
                                            d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="text" name="show_jp" id="show_jp"
                                class="form-control border-0 text-muted"
                                value="Rp{{ number_format($request->jumlah_pinjaman, 2) }}" disabled>

                                <input type="hidden" name="jumlah_pinjaman" value="{{ $request->jumlah_pinjaman }}">
                        </div>
                        <label for="lama_angsuran" class="text-muted">Lama Angsuran</label>
                        <div class="input-group mb-4 mt-3 shadow-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20">
                                        <path fill="#eeeeee"
                                            d="M15 2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h2V0h2v2h6V0h2v2zM3 6v12h14V6H3zm6 5V9h2v2h2v2h-2v2H9v-2H7v-2h2z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="number" name="lama_angsuran" id="lama_angsuran"
                                class="form-control border-0 text-muted"
                                value="{{ $request->lama_angsuran }}" disabled>
                                <input type="hidden" name="lama_angsuran" value="{{ $request->lama_angsuran }}">
                        </div>
                        <label for="show_ja" class="text-muted">Jumlah Angsuran (Bulan)</label>
                        <div class="input-group mb-2 mt-3 shadow-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20">
                                        <path fill="#eeeeee"
                                            d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="text" name="show_ja" id="show_ja" class="form-control border-0 text-muted"
                                value="Rp{{ number_format($angsuran, 2) }}" disabled>
                            <input type="hidden" name="jumlah_angsuran" value="{{ $angsuran }}">
                        </div>
                        <div class="d-flex justify-content-center pt-3 mb-3">
                            <button type="submit" class="btn btn-white mr-2 text-button-login shadow-sm">
                                {{ __('Ajukan') }}
                            </button>
                            <a href="{{url()->previous()}}" class="btn btn-warning shadow-sm">
                                Batalkan pinjaman
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection