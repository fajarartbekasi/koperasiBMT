@extends('layouts.app')

@section('content')
<div class="col-lg-6 col-md-6">
    <div class="card card-user">
        <div class="image">
            <img src="{{asset('asset/img/newbg.jpg')}}" width="100%" alt="...">
        </div>
        <div class="content">
            <div class="author">
                <img class="avatar border-white " src="{{asset('asset/img/avatar.png')}}" alt="...">
                <h4 class="title font-weight-bolder">{{Auth::user()->name}}<br>
                    <a href="#" class="text-muted">
                        <small>{{Auth::user()->email}}</small>
                    </a>
                </h4>
                <small>{{Auth::user()->created_at->diffForHumans()}}</small>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <div class="row">
                @role('anggota')
                    <div class="col-md-3 col-md-offset-1">
                        <h5>
                            Rp.{{number_format(auth()->user()->totalSaldo(), 2)}}
                            <br>
                            <small class="text-muted">Saldo Simpanan</small>
                        </h5>
                    </div>
                    @else
                    <div class="col-md-3 col-md-offset-1">
                        <h5>Rp.{{number_format($savings->sum('saldo'), 2)}}</h5>
                    </div>
                @endrole
                @role('anggota')
                    <div class="col-md-3">
                        <h5>
                            {{auth()->user()->dataPinjaman()->count()}}
                            <br>
                            <small class="text-muted">Data Pinjaman</small>
                        </h5>
                    </div>
                    @else
                    <div class="col-md-3">
                        <h5>
                            {{$pengajuan->where('terverifikasi', true)->count()}}
                        </h5>
                    </div>
                @endrole
                @role('anggota')
                    <div class="col-md-3">
                        <h5>
                            Rp.{{number_format(auth()->user()->totalPinjaman(), 2)}}
                            <br>
                            <small class="text-muted">Total Pinjaman</small>
                        </h5>
                    </div>
                    @else
                    <div class="col-md-3">
                        <h5>
                            Rp.{{number_format($pengajuan->where('terverifikasi', true)->sum('jumlah_pinjaman'), 2)}}
                        </h5>
                    </div>
                @endrole
                @role('anggota')
                <div class="col-md-3">
                    <h5>
                       {{auth()->user()->pengajuanPinjaman()->count()}}
                        <br>
                        <small class="text-muted">Pengajuan pinjaman</small>
                    </h5>
                </div>
                @else
                <div class="col-md-3">
                    <h5>
                        {{$pengajuan->where('terverifikasi', false)->count()}}
                    </h5>
                </div>
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
