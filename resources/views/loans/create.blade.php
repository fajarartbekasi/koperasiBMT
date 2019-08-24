@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
                <path fill="#ffffff"
                    d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z" />
            </svg>
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Jenis pinjaman
                    <strong class="text-warning">
                        {{$type->nama_jenis_pinjaman }}
                    </strong>
                    dengan
                </h6>
                <h6 class="mb-0 text-white lh-100">Bunga {{$type->bunga}} %</h6>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Formulir pengajuan pinjaman</h5>
            <div class="card-body">
                <form action="{{route('loans.kalkulasi', $type->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_pinjaman">Jumlah pinjaman</label>
                                <input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman"
                                    value="{{old('jumlah_pinjaman')}}" class="form-control" required>
                                <small class="text-muted">
                                    Minimum: Rp. {{number_format($type->minimum_jumlah_pinjaman, 2)}}
                                    Maksimum: Rp. {{number_format($type->maksimum_jumlah_pinjaman, 2)}}
                                </small>

                                <input type="hidden" name="minimum_jumlah_pinjaman"
                                    value="{{ $type->minimum_jumlah_pinjaman }}" readonly>
                                <input type="hidden" name="maksimum_jumlah_pinjaman"
                                    value="{{ $type->maksimum_jumlah_pinjaman }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lama_angsuran">Lama angsuran (bulan)</label>
                                <input type="text" name="lama_angsuran" id="lama_angsuran" value="{{old('lama_angsuran')}}"
                                    class="form-control" required>
                                <small class="text-muted">
                                    Minimum: {{ $type->minimum_lama_angsuran }} bulan
                                    Maksimum: {{ $type->maksimum_lama_angsuran }} bulan
                                </small>

                                <input type="hidden" name="minimum_lama_angsuran" value="{{ $type->minimum_lama_angsuran }}"
                                    readonly>
                                <input type="hidden" name="maksimum_lama_angsuran"
                                    value="{{ $type->maksimum_lama_angsuran }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-primary">
                                Kalkulasi
                            </button>
                            <a href="{{route('types.index')}}" class="btn btn-outline-secondary">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection