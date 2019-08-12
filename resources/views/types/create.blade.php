@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <h5 class="card-header">Formulir jenis pinjaman</h5>
            <div class="card-body">
                <form action="{{route('types.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_jenis_pinjaman">Jenis pinjaman:</label>
                                <input type="text" name="nama_jenis_pinjaman" value="{{old('nama_jenis_pinjaman')}}" id="nama_jenis_pinjaman" class="form-control" placeholder="Example...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="minimum_jumlah_pinjaman">Minimum jumlah pinjaman:</label>
                                <input type="number" name="minimum_jumlah_pinjaman" value="{{old('minimum_jumlah_pinjaman')}}" id="minimum_jumlah_pinjaman" class="form-control"
                                    >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="maksimum_jumlah_pinjaman">Maksimum jumlah pinjaman:</label>
                                <input type="number" name="maksimum_jumlah_pinjaman" value="{{old('maksimum_jumlah_pinjaman')}}" id="maksimum_jumlah_pinjaman" class="form-control"
                                    >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="minimum_lama_angsuran">Minimum lama angsuran:</label>
                                <input type="number" name="minimum_lama_angsuran" value="{{old('minimum_lama_angsuran')}}" id="minimum_lama_angsuran" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="maksimum_lama_angsuran">Maksimum lama angsuran:</label>
                                <input type="text" name="maksimum_lama_angsuran" value="{{old('maksimum_lama_angsuran')}}" id="maksimum_lama_angsuran" class="form-control"
                                    >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bunga">Bunga:</label>
                                <input type="number" name="bunga" value="{{old('bunga')}}" id="bunga" class="form-control"
                                    >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-primary">
                                Simpan
                            </button>
                            <a href="{{route('types.index')}}" type="submit" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection