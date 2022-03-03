<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laporan Anggota</title>
</head>

<body class="bg-white">
    <div class="content px-3">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <img src="{{asset('asset/img/tamansiswa.png')}}" alt="" width="10%" height="10%">
                    <P>
                        <b>
                            <h6>
                                {{ config('app.name', 'Laravel') }}
                            </h6>
                        </b>
                    </P>
                </div>
                @if (request('dari_tgl'))
                <small class="text-center">dari tanggal {{ request('tgl_awal') }} sampai tanggal {{ request('tgl_akhir') }}</small>
                @endif
                <div class="text-center ">
                    <u>
                        <h4>Laporan Angsuran Anggota</h4>
                    </u>
                </div>
                <div class="text-center mb-3">
                    @if (request('tgl_awal'))
                        <small>Dari tanggal {{ request('tgl_awal') }} &nbsp; sampai tanggal {{ request('tgl_akhir') }}</small>
                    @endif
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Jenis Pinjaman</th>
                            <th scope="col">Total Pinjaman</th>
                            <th scope="col">Total Angsuran</th>
                            <th scope="col">Lama Angsuran</th>
                            <th scope="col">Tanggal Angsuran</th>
                            <th scope="col">Angsuran Ke</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($installments as $installment )
                            <tr>
                                <td>{{$installment->loan->user->nip}}</td>
                                <td>{{$installment->loan->user->name}}</td>
                                <td>{{$installment->loan->type->nama_jenis_pinjaman}}</td>
                                <td>{{$installment->loan->jumlah_pinjaman}}</td>
                                <td>{{$installment->loan->jumlah_angsuran}}</td>
                                <td>{{$installment->loan->lama_angsuran}}</td>
                                <td>{{$installment->tanggal_bayar}}</td>
                                <td>{{$installment->angsuran_ke}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">Data belum ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
