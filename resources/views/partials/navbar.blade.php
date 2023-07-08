<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-5">
    <div class="container-fluid">
        @auth
            <ul class="navbar-nav">
                <a href="/" class="text-decoration-none">
                    <li class="fs-3 text-light">
                        <img src="/gambar/poliban.png" alt="Logo" width="100" class="d-inline-block align-text-center">
                        SI BEBAS MASALAH
                    </li>
                </a>
            </ul>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Selamat Datang,
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
                </button>
                <ul class="dropdown-menu">
                    @if (Auth::user()->role === 'Mahasiswa')
                        <li><a class="dropdown-item" href="/dashboardMhs">Dashboard Mahasiswa</a></li>
                    @endif

                    @if (Auth::user()->role === 'Admin Prodi')
                        <li><a class="dropdown-item" href="/dashboardAdmin">Dashboard Admin Prodi</a></li>
                    @endif
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <ul class="navbar-nav">
                <a href="/" class="text-decoration-none">
                    <li class="fs-3 text-light">
                        <img src="/gambar/poliban.png" alt="Logo" width="100"
                            class="d-inline-block align-text-center">
                        SI BEBAS MASALAH
                    </li>
                </a>
            </ul>
            <p class="fs-3">
                <a href="/login" class="nav-link link-light"><button class="btn btn-outline-light"
                        type="submit">LOGIN</button></a>
            </p>
        @endauth
    </div>
</nav>
