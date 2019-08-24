<table class="table table-striped">
    <thead>
        <th scope="col">Jenis pinjaman</th>
        <th scope="col">Jumlah pinjaman</th>
        <th scope="col">Bunga</th>
        <th scope="col">Jumlah angsuran</th>
        <th scope="col">Lama angsuran</th>
        <th scope="col">Tanggal persetujuan</th>
    </thead>
    <tbody>
        @forelse (auth()->user()->pengajuanPinjaman as $pengajuan)
            <tr>
                <th>
                    {{$pengajuan->type->nama_jenis_pinjaman}}
                </th>
                <td>Rp.{{number_format($pengajuan->jumlah_pinjaman, 2)}}</td>
                <td>{{$pengajuan->type->bunga}}%</td>
                <td>Rp.{{number_format($pengajuan->jumlah_angsuran, 2)}}</td>
                <td>{{$pengajuan->lama_angsuran}} bulan</td>
                <td>{{$pengajuan->tanggal_pengajuan->format('d-m-Y')}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">
                    Data pengajuan pinjaman belum tersedia.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>