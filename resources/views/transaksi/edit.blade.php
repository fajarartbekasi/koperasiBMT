@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body rounded-lg">
                    <h5 class="text-muted text-center mb-3">Formulir Penarikan</h5>

                    <form method="POST" action="{{route('transaksi.store', $saving->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">Nama Anggota</label>
                            <input type="text" name="" id="" value="{{$saving->user->name}}" class="form-control">
                            <input type="hidden" name="tabungan_id" id="" value="{{$saving->id}}" class="form-control">
                        </div>
                        <label for="jumlah_pinjaman" class="text-muted">Nominal tabungan</label>
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
                            <input type="number"
                                   name="total"
                                   id="total"
                                   class="form-control border-0 text-muted"
                                   value="{{$saving->saldo}}"
                                   required>

                        </div>
                        <div class="d-flex justify-content-center pt-3 mb-3">
                            <button type="submit" class="btn btn-white mr-2 text-button-login shadow-sm">
                                {{ __('Tarik Saldo') }}
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
