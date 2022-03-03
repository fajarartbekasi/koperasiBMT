<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laporan Periode</title>
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
                <div class="text-center">
                    <small>dari tanggal {{ request('tgl_awal') }} sampai tanggal {{ request('tgl_akhir') }}</small>
                </div>

                @endif
                <div class="text-center">
                    <h4>Laporan Periode</h4>
                    <u>
                        <h4>Data Anggota</h4>
                    </u>
                </div>
                @if (request('tgl_awal'))
                <div class="text-center mb-3">
                    <small>Dari tanggal {{ request('tgl_awal') }} &nbsp; sampai tanggal {{ request('tgl_akhir') }}</small>
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th >NIP Anggota</th>
                            <th >Nama Anggota</th>
                            <th >Roles</th>
                            <th >Email</th>
                            <th >Gender</th>
                            <th >Jabatan</th>
                            <th >Address</th>
                            <th >No.Telp</th>
                            <th >Tanggal Bergabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user )
                            <tr>
                                <td>{{$user->nip}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->roles->implode('name', ', ')}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->jenis_kelamin}}</td>
                                <td>{{$user->jabatan}}</td>
                                <td>{{$user->alamat}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->created_at->format('d-m-Y')}}</td>
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
