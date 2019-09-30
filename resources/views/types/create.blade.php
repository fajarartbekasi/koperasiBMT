@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow border-0">
                    <div class="card-body rounded-lg">
                        <p class="text-muted text-center mb-5">Input jenis pinjaman</p>
                        <div class="d-flex justify-content-center mb-5">

                        </div>
                        <form method="POST" action="{{route('types.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-4 shadow-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"
                                                    class="mr-2zZZZ">
                                                    <path fill="#eeeeee"
                                                        d="M10 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="text"
                                               name="nama_jenis_pinjaman"
                                               id="nama_jenis_pinjaman"
                                               class="form-control border-0 text-muted"
                                               value="{{ old('nama_jenis_pinjaman') }}"
                                               placeholder="Nama Jenis pinjaman.."
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-4 shadow-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2zZZZ">
                                                    <path fill="#eeeeee"
                                                        d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number"
                                               name="minumum_jumlah_pinjaman"
                                               id="minumum_jumlah_pinjaman"
                                               class="form-control border-0 text-muted"
                                               value="{{ old('minumum_jumlah_pinjaman') }}"
                                               placeholder="Minimum jumlah pinjaman.."
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-4 shadow-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2zZZZ">
                                                    <path fill="#eeeeee"
                                                        d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number"
                                               name="maksimum_jumlah_pinjaman"
                                               id="maksimum_jumlah_pinjaman"
                                               class="form-control border-0 text-muted"
                                               value="{{ old('maksimum_jumlah_pinjaman') }}"
                                               placeholder="Maksimum jumlah pinjaman.."
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-4 shadow-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2zZZZ">
                                                    <path fill="#eeeeee"
                                                        d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number"
                                               name="minimum_lama_angsuran"
                                               id="minimum_lama_angsuran"
                                               class="form-control border-0 text-muted"
                                               value="{{ old('minimum_lama_angsuran') }}"
                                               placeholder="Minimum lama angsuran.."
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-4 shadow-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2zZZZ">
                                                    <path fill="#eeeeee"
                                                        d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number"
                                               name="maksimum_lama_angsuran"
                                               id="maksimum_lama_angsuran"
                                               class="form-control border-0 text-muted"
                                               value="{{ old('maksimum_lama_angsuran') }}"
                                               placeholder="Maksimum lama angsuran.."
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-4 shadow-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2zZZZ">
                                                    <path fill="#eeeeee"
                                                        d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number"
                                               name="bunga"
                                               id="bunga"
                                               class="form-control border-0 text-muted"
                                               value="{{ old('bunga') }}"
                                               placeholder="Minimum lama angsuran.." required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center pt-3 mb-3">
                                <button type="submit" class="btn btn-white mr-3 shadow-sm">
                                    {{ __('Tambah jenis pinjaman baru') }}
                                </button>
                                <a href="{{route('types.index')}}" class="btn btn-warning shadow-sm">
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