<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Dokumen Pengajuan Pinjaman</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
</head>

<body class="bg-white">
    <div class="content px-3">
        <div class="row">
            <div class="col-md-4">
                {{ config('app.name', 'Laravel') }}<br />
                <br />

                <dl class="dl-horizontal">
                    <dt>Perihal</dt>
                    <dd>
                        Permohonan Pinjaman Uang <br />
                        pada Unit Simpan Pinjam <br />
                       {{ config('app.name', 'Laravel') }}
                    </dd>
                </dl>
            </div>
        </div>

        <div class="row text-left">
            <div class="col-md-4">
                Kepada Yth, <br />
                KETUA {{ config('app.name', 'Laravel') }} <br />
                Di.<u>Bekasi</u>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <ol>
                    <li>
                        Yang bertanda tangan dibawah ini: <br>
                        <strong>Nama</strong> : {{ $loan->user->nama }} <br />
                        <strong>Nip</strong> : {{ $loan->user->nip }} <br />
                        <strong>Jabatan</strong> : - <br />
                        <strong>No Hp</strong> : {{ $loan->user->no_hp }} <br />
                        Dengan ini saya mengajukan permohonan Pinjaman Uang kepada Ketua {{ config('app.name', 'Laravel') }}
                        Sebesar <strong>Rp{{ number_format($loan->jumlah_pinjaman, 2) }}</strong> Adapun uang tersebut
                        akan saya pergunakan
                        untuk keperluan
                        .................................................................................
                    </li>
                    <li>
                        Dalam hal ini saya bersedia dan sanggup memenuhi kewajiban saya kepada {{ config('app.name', 'Laravel') }}, bahwa hutang tersebut
                        diatas pembayarannya langsung dipotong dari hasil gaji setiap bulan selama
                        <strong>{{ $loan->lama_angsuran }}</strong>
                        dengan jasa pinjaman sebesar <strong>{{ $loan->type->bunga }}%</strong> tetap mulai
                        {{ $loan->created_at->format('d-m-Y') }}.
                    </li>
                    <li>
                        Saya bersedia dipotong langsung dari jumlah pinjaman sebesar 1% untuk Dana Perlindungan Bersama
                        sesuai hasil Rapat Anggota Tahunan
                        pada tanggal .....
                    </li>
                    <li>
                        Bersama ini saya (Pemohon) memberikan Kuasa kepada Ketua BMT untuk
                        memotong langsung pinjaman saya
                        kepada {{ config('app.name', 'Laravel') }} dari hasil Gaji setiap bulan sampai lunas.
                    </li>
                    <li>
                        Demikian permohonan saya ini, semoga Bapak dapat mengabulkannya dan atas kebijaksanaan Bapak,
                        saya ucapkan terima kasih.
                    </li>
                </ol>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-5 text-left">
                YANG DIBERI KUASA:<br />
                (Atas Nama)
                <br>
                <br>

                <hr>
            </div>
            <div class="col-xs-5 text-right">
                PEMOHON / PEMBERI KUASA
                <br>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5 text-left">
                MENGETAHUI: <br>
                (Atas Nama)
                <br>
                <br>
                <hr>
            </div>
            <div class="col-xs-5 text-right">
                MENYETUJUI: <br>
                (Atas Nama)
                <br>
                <br>
            </div>
        </div>
    </div>
</body>

</html>