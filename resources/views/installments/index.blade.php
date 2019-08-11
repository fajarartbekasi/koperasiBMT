@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
                <path fill="#ffffff"
                    d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
            </svg>
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Data Angsuran</h6>
            </div>

        </div>
        {{-- table angsuran pinjaman --}}
        @role('anggota')
            @include('installments._anggota')
        @else
            @include('installments._all')
        @endrole
    </div>
@endsection