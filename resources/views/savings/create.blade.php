@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
            <path fill="#ffffff"
                d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
        </svg>
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Setiap Saldo masuk otomatis menambahkan saldo anggota,</h6>
            <h6 class="mb-0 text-white lh-100">bulan dan tanggal saldo masuk sesuai saat bendahara menambahkan saldo.</h6>
        </div>
    </div>

    <form action="" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <label for="saldo">Saldo masuk:</label>
                    <input type="number" name="saldo" id="saldo" value="" class="form-control" >
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">
                        Kirim
                    </button>
                    <button type="submit" class="btn btn-outline-secondary">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection