<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nip</th>
            <th scope="col">Nama anggota</th>
            <th scope="col">E-mail</th>
            <th scope="col">Total saldo</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $anggota)
            <tr>
                <td>{{$anggota->nip}}</td>
                <td>{{$anggota->name}}</td>
                <td>{{$anggota->email}}</td>
                <td>Rp. {{number_format($anggota->totalSaldo(), 2)}}</td>
            </tr>
        @empty
            {{-- jika tidak ada data jenis pinjaman --}}
            <tr>
                <td colspan="4">Data belum ada</td>
            </tr>
        @endforelse
    </tbody>
</table>