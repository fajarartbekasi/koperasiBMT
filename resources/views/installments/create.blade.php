@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <h5 class="card-header">Formulir angsuran pinjaman</h5>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <strong>
                            Angsuran atas nama
                        </strong>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah_angsuran">Jumlah angsurans:</label>
                                <input type="number" name="jumlah_angsuran" value="" id="jumlah_angsuran"
                                    class="form-control" disabled>

                                    <input type="hidden" name="jumlah_angsuran" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="angsuran_ke">Angsuran ke:</label>
                                <input type="number" name="angsuran_ke" value="" id="angsuran_ke"
                                    class="form-control">
                                    <input type="hidden" name="angsuran_ke" class="form-control" value="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-primary">
                                Simpan
                            </button>
                            <button type="submit" class="btn btn-outline-secondary">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection