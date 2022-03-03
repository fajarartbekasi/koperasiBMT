<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laporan periode Pinjaman</title>
</head>

<body class="bg-white">
    <div class="content px-3">
        <div class="row">
            <div class="col-md-12">
                <div >
                    <img src="{{asset('asset/img/tamansiswa.png')}}" alt="" width="10%" height="10%">
                    <P>
                        <b>
                            <h6>
                                {{ config('app.name', 'Laravel') }}
                            </h6>
                        </b>
                    </P>
                </div>
                <u>
                    <h4 class="text-center">Laporan Periode Pinjaman</h4>
                </u>
                @if (request('dari_tgl'))
                    <div class="text-center mb-3">
                        <small>dari tanggal {{ request('dari_tgl') }} sampai tanggal {{ request('sampai_tgl') }}</small>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIP Anggota</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Jenis Pinjaman</th>
                            <th scope="col">Jumlah Pinjaman</th>
                            <th scope="col">Bunga</th>
                            <th scope="col">Jumlah Angsuran</th>
                            <th scope="col">Lama Angsuran</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col">Tanggal Persetujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $pinjaman)
                        <tr>
                            <th>
                                {{ $pinjaman->user->nip }}
                            </th>
                            <td>{{ $pinjaman->user->name }}</td>
                            <td>{{ $pinjaman->type->nama_jenis_pinjaman }}</td>
                            <td>Rp{{ number_format($pinjaman->jumlah_pinjaman, 2) }}</td>
                            <td>{{ $pinjaman->type->bunga }}%</td>
                            <td>Rp{{ number_format($pinjaman->jumlah_angsuran, 2) }}</td>
                            <td>{{ $pinjaman->lama_angsuran }} bulan</td>
                            <td>{{ $pinjaman->tanggal_pengajuan->format('d-m-Y') }}</td>
                            <td>{{ $pinjaman->tanggal_persetujuan->format('d-m-Y') }}</td>
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
