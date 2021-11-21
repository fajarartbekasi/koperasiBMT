@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="48" height="48" class="mr-3">
                <path fill="#ffffff"
                    d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z" />
            </svg>
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Jenis pinjaman</h6>
            </div>
            @role('bendahara')
                <div class="ml-auto">
                    <a href="{{route('types.create')}}">
                        <button type="button" class="btn btn-outline-light text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-3">
                                <path fill="#ffffff"
                                    d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z" />
                            </svg>
                            Tambah
                        </button>
                    </a>
                </div>
            @endrole
        </div>
        <table class="table table-striped">
            <thead>
                <th scope="col">Nama</th>
                <th scope="col">Minimum jumlah pinjaman</th>
                <th scope="col">Maksimum jumlah pinjaman</th>
                <th scope="col">Minimum lama angsuran</th>
                <th scope="col">Maksimum lama angsuran</th>
                <th scope="col">Bunga</th>
                {{-- role anggota --}}
                @role('anggota')
                    <th scope="col">Ajukan</th>
                @endrole
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <th>
                            @role('bendahara')
                                <a href="{{route('types.edit', $type->id)}}">
                                    {{$type->nama_jenis_pinjaman}}
                                </a>
                            @else
                                {{$type->nama_jenis_pinjaman}}
                            @endrole
                        </th>
                        <td>Rp.{{number_format($type->minimum_jumlah_pinjaman, 2)}}</td>
                        <td>Rp.{{number_format($type->maksimum_jumlah_pinjaman, 2)}}</td>
                        <td>{{$type->minimum_lama_angsuran}}</td>
                        <td>{{$type->maksimum_lama_angsuran}}</td>
                        <td>{{$type->bunga}}%</td>
                        @role('anggota')
                        <td>
                            <a href="{{route('loans.create', $type->id)}}" class="btn btn-outline-primary">
                                Ajukan
                            </a>
                        </td>
                        @endrole
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            Data jenis pinjaman belum tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- <div class="float-right">
        {{$types->links()}}
    </div> --}}
@endsection