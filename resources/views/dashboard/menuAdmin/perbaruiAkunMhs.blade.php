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
                <h4>Perbarui Akun Mahasiswa</h4>
            </div>
        </div>
        <form action="/dashboardAdmin/akunMahasiswa/perbaruiAkunMhs{{ $akunMhs->id_user }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" placeholder="Username" name="username" id="username"
                    value="{{ $akunMhs->username }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" placeholder="Email" name="email" id="email"
                    value="{{ $akunMhs->email }}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Password" name="password" id="password">
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="Mahasiswa">Mahasiswa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>

    </div>
@endsection
