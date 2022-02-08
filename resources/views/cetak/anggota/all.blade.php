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

                <u>
                    <h4>Laporan Anggota</h4>
                </u>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIP Anggota</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Address</th>
                            <th scope="col">No.Telp</th>
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
