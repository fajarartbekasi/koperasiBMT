<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">NIK</th>
            <th scope="col">Nama anggota</th>
            <th scope="col">Jenis pinjaman</th>
            <th scope="col">Total pinjaman</th>
            <th scope="col">Total angsuran</th>
            <th scope="col">Lama angsuran</th>
        </tr>
    </thead>
    <tbody>
        @forelse (auth()->user()->loans as $pinjaman)
        <tr>
            <td>
                <a href="{{route('installments.show', $pinjaman->id)}}">
                    {{$pinjaman->user->nip}}
                </a>
            </td>
            <td>{{$pinjaman->user->name}}</td>
            <td>{{$pinjaman->type->nama_jenis_pinjaman}}</td>
            <td>{{number_format($pinjaman->jumlah_pinjaman)}}</td>
            <td>{{number_format($pinjaman->jumlah_angsuran)}}</td>
            <td>{{$pinjaman->lama_angsuran}}</td>
        </tr>
        @empty
            {{-- jika data kosong --}}
            <tr>
                <td colspan="6">
                    Data belum tersedia
                </td>
            </tr>

        @endforelse

    </tbody>
</table>