<table class="table table-striped">
    <thead>
        <th scope="col">NIK Anggota</th>
        <th scope="col">Nama Anggota</th>
        <th scope="col">Jenis pinjaman</th>
        <th scope="col">Jumlah pinjaman</th>
        <th scope="col">Bunga</th>
        <th scope="col">Jumlah angsuran</th>
        <th scope="col">Lama angsuran</th>
        <th scope="col">Tanggal angsuran</th>
        <th scope="col">Tanggal Persetujuan</th>
    </thead>
    <tbody>
        @forelse ($loans as $pinjaman)
            <tr>
                <th>
                    {{$pinjaman->user->nip}}
                </th>
                <td>{{$pinjaman->user->name}}</td>
                <td>{{$pinjaman->type->nama_jenis_pinjaman}}</td>
                <td>Rp.{{number_format($pinjaman->jumlah_pinjaman, 2)}}</td>
                <td>{{$pinjaman->type->bunga}}%</td>
                <td>Rp.{{number_format($pinjaman->jumlah_angsuran, 2)}}</td>
                <td>{{$pinjaman->lama_angsuran}}bulan</td>
                <td>{{$pinjaman->tanggal_pengajuan->format('d-m-Y')}}</td>
                <td>{{$pinjaman->tanggal_persetujuan->format('d-m-Y')}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9">
                    Data pinjaman belum tersedia.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>