<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Kwitansi</title>
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
                <div>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Atas Nama </td>
                                <td>{{$penarikan->tabungan->user->name}}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Penarikan </td>
                                <td>Rp.{{number_format($penarikan->total)}}</td>
                            </tr>
                            <tr>
                                <td>Sisa Saldo </td>
                                <td>Rp.{{number_format($penarikan->tabungan->saldo)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>