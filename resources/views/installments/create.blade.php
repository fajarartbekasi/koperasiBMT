@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-body rounded-lg">
                        <p class="text-muted text-center mb-5">Formulir angsuran pinjaman</p>
                        <div class="d-flex justify-content-center mb-5">
                            <div class="alert alert-info" role="alert">
                                Angsuran atas nama :
                                <strong class="text-danger">
                                    {{ $loan->user->name }}
                                </strong>
                            </div>
                        </div>
                        <p class="text-muted text-center pt-3 mb-5">Login dengan akun</p>
                        <form method="POST" action="{{route('installments.store', $loan->id)}}">
                            @csrf
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
                                <input type="text"
                                       name="jumlah_angsuran"
                                       id="jumlah_angsuran"
                                       class="form-control border-0 text-muted"
                                       value="Rp{{number_format($loan->jumlah_angsuran, 2)}}"
                                       required >

                                <input type="hidden" name="jumlah_angsuran" class="form-control" value="{{$loan->jumlah_angsuran}}">
                            </div>
                            <div class="input-group mb-2 mt-3 shadow-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text border-0 bg-white">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20">
                                            <path fill="#eeeeee"
                                                d="M0 4c0-1.1.9-2 2-2h15a1 1 0 0 1 1 1v1H2v1h17a1 1 0 0 1 1 1v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm16.5 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="number"
                                       name="nagsuran_ke"
                                       id="nagsuran_ke"
                                       class="form-control border-0 text-muted"
                                       value="{{$angsuran_ke}}"
                                       placeholder="nagsuran_ke" required>
                                <input type="hidden" name="angsuran_ke" class="form-control" value="{{$angsuran_ke}}">
                            </div>
                            <div class="d-flex justify-content-center pt-3 mb-3">
                                <button type="submit" class="btn btn-white mr-3 shadow-sm">
                                    {{ __('Masukan angsuran') }}
                                </button>
                                <a href="{{route('installments.index')}}" class="btn btn-warning shadow-sm">
                                        {{ __('Cancel') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection