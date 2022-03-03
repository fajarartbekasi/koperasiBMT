@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
            <path fill="#ffffff"
                d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
        </svg>
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Data Pinjaman</h6>
            <small class="text-white">Semua data pinjaman</small>
        </div>
    </div>

    {{-- role sekretaris|ketua --}}
    @role('bendahara|ketua')
        <h4>Cari Laporan</h4>
        <form action="{{route('loans.cetak')}}" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="date" name="dari_tgl" class="form-control" id="date">
                    </div>
                </div>
                <label for="" class="mt-2">S/D</label>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="date" name="sampai_tgl" class="form-control" id="date">
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-outline-primary">Print report</button>
                </div>
                @role('ketua|bendahara')
                <div class="col-md-3">
                    <a href="{{route('loans.cetak')}}" class="btn btn-outline-secondary">
                        Print all
                    </a>
                </div>
                @endrole
            </div>
        </form>
    @endrole

    {{-- table data pinjaman  --}}
    @role('anggota')
        @include('loans._anggota')
    @else
        @include('loans._all')
    @endrole
</div>
@endsection
