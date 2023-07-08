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
                            <li><a href="/dashboardAdmin">Ubah Status Umum</a></li>
                            <li>
                                <a href="/dashboardAdmin/statusAkademik">Ubah Status Akademik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-notepad-2"></span><span class="mtext">Daftar Akun</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/dashboardAdmin">Mahasiswa</a></li>
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

    <div class=" pd-20 card-box mb-30">

        <div class="clearfix justify-content-center">
            <div class="text-center mb-30">
                <h4>Ubah Status Bebas Masalah Akademik</h4>
            </div>
        </div>
        <form action="/dashboardAdmin/ubahStatusAkademik{{ $akademik->id_akademik }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label>Status Bebas Masalah</label>
                <select class="form-control" name="akademik" id="akademik">
                    <option value="Bermasalah">Bermasalah</option>
                    <option value="Bebas Masalah">Bebas Masalah</option>
                </select>
            </div>

            <div class="form-group">
                <label for="username">Rincian Status</label>
                <input type="text" name="rincian" class="form-control" id="rincian" placeholder="Rincian Status"
                    value="{{ old('rincian'), $akademik->rincian_akademik }}" />
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
