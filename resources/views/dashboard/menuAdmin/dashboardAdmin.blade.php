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

    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="vendors/images/banner-img.png" alt="" />
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-30 text-capitalize">
                        Selamat Datang
                        <div class="weight-600 font-30 text-blue">Admin Prodi</div>
                    </h4>
                </div>
            </div>
        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="text-center mb-20">
                    <h4>Status Bebas Masalah Umum</h4>
                </div>

                <div class="pull-right">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle dw dw-filter-1" href="#" role="button" data-toggle="dropdown">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-status="bebas masalah">Bebas Masalah</a>
                            <a class="dropdown-item" href="#" data-status="bermasalah">Bermasalah</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Status Tugas Akhir</th>
                        <th scope="col">Status Registrasi</th>
                        <th scope="col">Status Perpustakaan</th>
                        <th scope="col">Status Akademik</th>
                        <th scope="col">Status Bebas Masalah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mhs)
                        <tr class="clickable-row" data-id="{{ $mhs->id_mahasiswa }}">
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_mhs }}</td>
                            <td>{{ $mhs->jurusan->nama_jurusan ?? '' }}</td>
                            <td>{{ $mhs->jurusan->nama_prodi ?? '' }}</td>
                            <td>{{ $mhs->tugas_akhir->pluck('status_ta')->implode(', ') }}</td>
                            <td>{{ $mhs->keuangan->pluck('status_keuangan')->implode(', ') }}</td>
                            <td>{{ $mhs->perpustakaan->pluck('status_perpus')->implode(', ') }}</td>
                            <td>{{ $mhs->akademik->pluck('status_akademik')->implode(', ') }}</td>
                            <td>{{ $mhs->status_umum }}</td>
                            <td><a href="/dashboardAdmin/ubahStatusUmum{{ $mhs->id_mahasiswa }}" class="badge"><i
                                        class="icon-copy dw dw-edit-1 ml-2 linked"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    {{ $mahasiswa->links() }}
@endsection
