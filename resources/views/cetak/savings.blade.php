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
                    <img src="{{asset('asset/img/tamansiswa.png')}}" alt="" width="10%" height="10%">
                    <P>
                        <b>
                            <h6>
                                {{ config('app.name', 'Laravel') }}
                            </h6>
                        </b>
                    </P>
                </div>
                <h4 class="mb-3 text-center"><u>Laporan Data Simpanan</u></h4>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIP Anggota</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Total Saldo</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <th>
                                {{ $user->nip }}
                            </th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Rp{{ number_format($user->totalSaldo(), 2) }}</td>
                            <td>{{ $user->created_at->format('d-m-Y')}}</td>
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
