@extends('layouts.app')

@section('pengajuan_pinjaman', 'm-menu__item--active')

@section('content')
<div class="col-lg-12">
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--tab">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Kalkulasi Pengajuan Pinjaman
                    </h3>
                </div>
            </div>
        </div>

        <form action="{{ route('loans.store', $type->id) }}" method="POST"
            class="m-form m-form--fit m-form--label-align-right">
            @csrf

            <div class="m-portlet__body">
                <div class="alert m-alert--default" role="alert">
                    <strong>
                        Jenis Pinjaman {{ $type->nama_jenis_pinjaman }}
                        dengan
                        Bunga {{ $type->bunga }}%
                    </strong>
                </div>

                <div class="form-group m-form__group">
                    <label for="show_jp">Jumlah Pinjaman</label>
                    <input type="text" class="form-control m-input" id="show_jp" name="show_jp"
                        value="Rp{{ number_format($request->jumlah_pinjaman, 2) }}" disabled>

                    <input type="hidden" name="jumlah_pinjaman" value="{{ $request->jumlah_pinjaman }}">
                </div>

                <div class="form-group m-form__group">
                    <label for="lama_angsuran">Lama Angsuran (bulan)</label>
                    <input type="number" class="form-control m-input" id="lama_angsuran" name="lama_angsuran"
                        value="{{ $request->lama_angsuran }}" disabled>

                    <input type="hidden" name="lama_angsuran" value="{{ $request->lama_angsuran }}">
                </div>

                <div class="form-group m-form__group">
                    <label for="show_ja">Angsuran Perbulan</label>
                    <input type="text" class="form-control m-input" id="show_ja" name="show_ja"
                        value="Rp{{ number_format($angsuran, 2) }}" disabled>

                    <input type="hidden" name="jumlah_angsuran" value="{{ $angsuran }}">
                </div>
            </div>

            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <button type="submit"
                        class="btn m-btn--gradient-from-info m-btn--gradient-to-primary m-btn">Ajukan</button>
                    <a class="btn btn-secondary" href="{{ url()->previous() }}" role="button">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <!--end::Portlet-->
</div>
@endsection