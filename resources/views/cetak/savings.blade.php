<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laporan saldo anggota</title>
</head>

<body class="bg-white">
    <div class="content px-3">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <P>
                        <b>
                            <h3>KOPERASI BMT
                                <br>
                                Alamat</h3>
                            <h4>BADAN HUKUM NO : </h4>
                            <hr>
                        </b></P>
                </div>
                <h4><u>Laporan Data Simpanan</u></h4>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIP Anggota</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Total Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <th>
                                {{ $user->nip }}
                            </th>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Rp{{ number_format($user->totalSaldo(), 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">Data simpanan belum ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>