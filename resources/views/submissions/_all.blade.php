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
            @role('bendahara')
                <th scope="col">Persetujuan</th>
            @endrole
        </thead>
        <tbody>
            @forelse ($submissions as $pengajuan)
                <tr>
                    <th>
                        {{$pengajuan->user->nip}}
                    </th>
                    <td>{{$pengajuan->user->name}}</td>
                    <td>{{$pengajuan->type->nama_jenis_pinjaman}}</td>
                    <td>Rp.{{number_format($pengajuan->jumlah_pinjaman, 2)}}</td>
                    <td>{{$pengajuan->type->bunga}}%</td>
                    <td>Rp.{{number_format($pengajuan->jumlah_angsuran, 2)}}</td>
                    <td>{{$pengajuan->lama_angsuran}} bulan</td>
                    <td>{{$pengajuan->tanggal_pengajuan->format('d-m-Y')}}</td>
                    @role('bendahara')
                        <td>
                            <a href="{{ route('submissions.store', $pengajuan->id) }}" class="btn btn-sm btn-primary" onclick="event.preventDefault();
                            document.getElementById('approve-form').submit();">
                                Setujui
                            </a>
                            <form id="approve-form" action="{{ route('submissions.store', $pengajuan->id) }}" method="POST" style="display: none;">
                                @csrf
                                <input type="text" name="phone" id="" value="{{$pengajuan->user->phone}}">
                            </form>

                            <a href="{{ route('loans.destroy', $pengajuan->id) }}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                            document.getElementById('tolak-form').submit();">
                                Tolak
                            </a>
                            <form id="tolak-form" action="{{ route('loans.destroy', $pengajuan->id) }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="{{ route('loans.print', $pengajuan->id)}}" target="_blank" class="btn btn-sm btn-info">Cetak</a>
                        </td>
                    @endrole
                </tr>
            @empty
                {{-- jika data kosong --}}
                <tr>
                    <td colspan="9">
                        Data pengajuan pinjaman belum tersedia.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>