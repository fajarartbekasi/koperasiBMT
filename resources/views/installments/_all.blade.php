<table class="table table-striped">
    <thead>
        <th scope="col">NIK</th>
        <th scope="col">Nama anggota</th>
        <th scope="col">Jenis pinjaman</th>
        <th scope="col">Total pinjaman</th>
        <th scope="col">Total angsuran</th>
        <th scope="col">Lama angsuran</th>
        <th scope="col">Angsuran</th>
    </thead>
    <tbody>
        @forelse ($loans as $pinjaman)
            <td>
               <a href="{{route('installments.show', $pinjaman->id)}}">
                    {{$pinjaman->user->nip}}
                </a>
            </td>
            <td>{{$pinjaman->user->name}}</td>
            <td>{{$pinjaman->type->nama_jenis_pinjaman}}</td>
            <td>Rp{{number_format($pinjaman->jumlah_pinjaman, 2)}}</td>
            <td>Rp{{number_format($pinjaman->jumlah_angsuran)}}</td>
            <td>{{$jumlah_angsuran->lama_angsuran}}</td>
            <td>
                <a href="{{route('installments.create', $pinjaman->id)}}" class="btn btn-sm btn-outline-primary">
                    Input angsuran
                </a>
            </td>
        @empty
            {{-- jika data kosong --}}
            <tr>
                <td colspan="9">
                    Data belum tersedia
                </td>
            </tr>

        @endforelse

    </tbody>
</table>