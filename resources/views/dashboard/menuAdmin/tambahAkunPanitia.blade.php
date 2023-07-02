@extends('dashboard.layouts.utama')

@section('container')
    <div class="left-side-bar">

        <p class="text-light text-center">Politeknik Negeri Banjarmasin</p>
        <img class="rounded mx-auto d-block mb-3" src="/gambar/poliban.png" alt="Logo" width="95">

        <div class="menu-block
                customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-grid"></span><span class="mtext">Dashboard</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/dashboardAdmin">Bebas Masalah Umum</a></li>
                            <li>
                                <a href="/dashboardAdmin/statusAkademik">Bebas Masalah Akademik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-notepad-2"></span><span class="mtext">Daftar Akun</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/dashboardAdmin/akunMahasiswa">Mahasiswa</a></li>
                            <li>
                                <a href="/dashboardAdmin/akunPanitia">Panitia</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="/dashboardAdmin/beritaUtama" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-newspaper-1"></span><span class="mtext">Berita Utama</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">


        <div class="clearfix justify-content-center">
            <div class="text-center mb-30">
                <h4>Tambah Akun Panitia</h4>
            </div>
        </div>
        <form action="/dashboardAdmin/akunPanitia/tambahAkunPanitia" method="POST">
            @csrf

            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" placeholder="Username" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" placeholder="Email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="Admin Prodi">Admin Prodi</option>
                    <option value="Panitia Tugas Akhir">Panitia Tugas Akhir</option>
                    <option value="Panitia Keuangan">Panitia Keuangan</option>
                    <option value="Panitia Perpustakan">Panitia Perpustakaan</option>
                    <option value="Ketua Jurusan">Ketua Jurusan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
@endsection
