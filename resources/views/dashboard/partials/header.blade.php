<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-3 header-left">
                <div class="menu-icon dw dw-menu"></div>
            </div>
            <div class="col-6 col-md-9 header-right">
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle mt-2" href="#" role="button" data-toggle="dropdown">
                            <span class="user-name d-none d-md-inline">Selamat Datang,
                                @if (Auth::check())
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
                                @endif
                            </span>
                            <span class="user-name d-inline d-md-none">Selamat Datang</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            @if (Auth::check() && Auth::user()->role === 'Mahasiswa')
                                <a class="dropdown-item" href="/dashboardMhs/profileMhs"><i
                                        class="dw dw-user1"></i>Profile</a>
                            @endif

                            @if (Auth::check() && Auth::user()->role === 'Admin Prodi')
                                <a class="dropdown-item" href="/dashboardAdmin/profileAdmin"><i
                                        class="dw dw-user1"></i>Profile</a>
                            @endif

                            @if (Auth::check() && Auth::user()->role === 'Panitia Tugas Akhir')
                                <a class="dropdown-item" href="/dashboardPanitiaTa/profilePanitiaTa"><i
                                        class="dw dw-user1"></i>Profile</a>
                            @endif

                            @if (Auth::check() && Auth::user()->role === 'Panitia Keuangan')
                                <a class="dropdown-item" href="/dashboardPanitiaKeuangan/profilePanitiaKeuangan"><i
                                        class="dw dw-user1"></i>Profile</a>
                            @endif

                            @if (Auth::check() && Auth::user()->role === 'Panitia Perpustakaan')
                                <a class="dropdown-item"
                                    href="/dashboardPanitiaPerpustakaan/profilePanitiaPerpustakaan"><i
                                        class="dw dw-user1"></i>Profile</a>
                            @endif

                            @if (Auth::check() && Auth::user()->role === 'Ketua Jurusan')
                                <a class="dropdown-item" href="/dashboardPanitiaKetuaJurusan/profileKetuaJurusan"><i
                                        class="dw dw-user1"></i>Profile</a>
                            @endif

                            <a class="dropdown-item" href="/"><i class="dw dw-newspaper-1"></i>Halaman Utama</a>
                            @if (Auth::check())
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="icon-copy dw dw-logout"></i>
                                        Logout</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
