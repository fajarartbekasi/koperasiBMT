@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body rounded-lg">
                    <h5 class="text-muted text-center mb-3">Formulir tabungan</h5>
                    <div class="d-flex justify-content-center mb-5">
                        <div class="alert alert-info" role="alert">
                            <strong class="text-danger">
                                Setiap Saldo masuk otomatis menambahkan saldo anggota,
                            </strong>
                            <strong class="text-danger">
                                bulan dan tanggal saldo masuk sesuai saat bendahara menambahkan saldo.
                            </strong>
                        </div>
                    </div>
                    <form method="POST" action="{{route('savings.update', $saving->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">Nama Anggota</label>
                            <input type="text" name="" id="" value="{{$saving->user->name}}" class="form-control">
                            <input type="hidden" name="user_id" id="" value="{{$saving->user->id}}" class="form-control">
                        </div>
                        <label for="jumlah_pinjaman" class="text-muted">Saldo Anda</label>
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
                            <input type="number" class="form-control border-0 text-muted" value="{{$saving->saldo}}">

                        </div>
                        <div class="input-group mb-4 shadow-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2zZZZ">
                                        <path fill="#eeeeee"
                                            d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="number" name="saldo" id="saldo" class="form-control border-0 text-muted" placeholder="Masukan Nominal tabungan"
                                required>

                        </div>
                        <div class="d-flex justify-content-center pt-3 mb-3">
                            <button type="submit" class="btn btn-white mr-2 text-button-login shadow-sm">
                                {{ __('Simpan tabungan') }}
                            </button>
                            <a href="{{route('savings.anggota')}}" class="btn btn-warning shadow-sm">
                                Batalkan
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
