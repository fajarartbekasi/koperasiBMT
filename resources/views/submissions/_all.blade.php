<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col">NIK</th>
            <th scope="col">Nama anggota</th>
            <th scope="col">Jenis pinjaman</th>
            <th scope="col">Jumlah pinjaman</th>
            <th scope="col">Bunga</th>
            <th scope="col">Jumlah angsuran</th>
            <th scope="col">Lama angsuran</th>
            <th scope="col">Tanggal persetujuan</th>
            <th scope="col">Persetujuan</th>
        </thead>
        <tbody>
            <td>199312102018081001</td>
            <td>Ketua</td>
            <td>Pria</td>
            <td>-</td>
            <td>6249 Blanda Branch Apt. 843 Lake Freeman, OR 57175-4928</td>
            <td>081345768690</td>
            <td>Anggota</td>
            <td>Anggota</td>
            <td>
                <a href="http://" class="btn btn-sm btn-outline-primary">Setujui</a>
                <form action="" id="approve-form" style="display:none;">
                    @csrf
                </form>
                <a href="http://" class="btn btn-sm btn-outline-danger">Tolak</a>
                <form action="" id="approve-form" style="display:none;">
                    @csrf
                </form>
                <a href="http://" class="btn btn-sm btn-outline-info">Cetak</a>
            </td>

            {{-- jika data kosong --}}
            <tr>
                <td colspan="9">
                    Data belum tersedia
                </td>
            </tr>
        </tbody>
    </table>
</div>