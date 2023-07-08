<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle mt-2" href="#" role="button" data-toggle="dropdown">
                    <span class="user-name">Selamat Datang,
                        @if (Auth::User()->role == 'Mahasiswa')
                            @if (Auth::User()->mahasiswa && Auth::User()->mahasiswa->nama_mhs)
                                {{ Auth::User()->mahasiswa->nama_mhs }}
                            @else
                                {{ Auth::User()->username }}
                            @endif
                        @elseif(Auth::User()->role == 'Admin Prodi' ||
                                Auth::User()->role == 'Panitia Tugas Akhir' ||
                                Auth::User()->role == 'Panitia Keuangan' ||
                                Auth::User()->role == 'Panitia Perpustakaan' ||
                                Auth::User()->role == 'Ketua Jurusan')
                            @if (Auth::User()->pegawai && Auth::User()->pegawai->nama_pegawai)
                                {{ Auth::User()->pegawai->nama_pegawai }}
                            @else
                                {{ Auth::User()->username }}
                            @endif
                        @else
                            {{ Auth::User()->username }}
                        @endif
                    </span>
                </a>


                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    @if (Auth::user()->role === 'Mahasiswa')
                        <a class="dropdown-item" href="/dashboardMhs/profileMhs"><i class="dw dw-user1"></i>Profile</a>
                    @endif

                    @if (Auth::user()->role === 'Admin Prodi')
                        <a class="dropdown-item" href="/dashboardAdmin/profileAdmin"><i
                                class="dw dw-user1"></i>Profile</a>
                    @endif
                    <a class="dropdown-item" href="/"><i class="dw dw-newspaper-1"></i>Halaman Utama</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="icon-copy dw dw-logout"></i>
                            Logout</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
