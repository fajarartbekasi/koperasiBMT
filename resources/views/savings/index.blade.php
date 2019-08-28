@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        @role('anggota')
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-info rounded shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
                    <path fill="#ffffff"
                        d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
                </svg>
                <div class="lh-100">
                    <div>
                        <h3 class="mb-1 text-white lh-100">KOPERASI BMT.:</h3>
                    </div>
                    <div>
                        <h5 class="mb-1 text-white lh-100">Alamat :</h5>
                    </div>
                    <strong class="text-white">
                        Badan Hukum
                    </strong>
                </div>
            </div>
        @endrole
        @role('bendahara')
            <div>
                <a href="{{route('savings.create')}}" class="btn btn-outline-primary mb-2">
                    <span>Tamabah simpanan anggota</span>
                </a>
            </div>
        @endrole

        @role('anggota')
            @include('savings._anggota')
        @endrole
        @role('ketua|bendahara')
            @include('savings._all')
        @endrole

        @role('sekertaris|bendahara')
            <a href="{{route('reports.savings')}}" class="btn btn-outline-secondary">
                Cetak data
            </a>
        @endrole
    </div>
@endsection