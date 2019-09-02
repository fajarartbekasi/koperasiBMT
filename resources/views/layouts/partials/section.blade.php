<div class="nav-scroller bg-white shadow-sm">
    <nav class="nav nav-underline">

        @if (Route::has('login'))
            @auth
                {{-- mulai role sekretaris|ketua --}}
                    @role('sekertaris|ketua')
                        <a class="nav-link active" href="#">Dashboard</a>
                        <a class="nav-link" href="{{route('pegawai.index')}}">
                            Pegawai
                        </a>
                        <a class="nav-link" href="{{route('anggota.index')}}">Anggota</a>
                    @endrole
                {{-- selesai role sekretaris|ketua --}}
                        <a class="nav-link" href="{{route('loans')}}">Data Pinjaman</a>
                        <a class="nav-link" href="{{route('types.index')}}">Jenis Pinjaman</a>
                        <a class="nav-link" href="{{route('submissions')}}">Pengajuan Pinjaman</a>
                        <a class="nav-link" href="{{route('installments.index')}}">Data Angsuran</a>
                    {{-- start role ketua|bendahara|anggota --}}
                    @role('bendahara|ketua|anggota')
                        <a class="nav-link" href="{{route('savings.index')}}">Saldo</a>
                    @endrole
                    {{-- start role ketua|bendahara|anggota --}}
            @else
                <div class="flex-center position-ref full-right">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                </div>
             @endauth
        @endif

    </nav>
</div>