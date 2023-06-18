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
                        <a href="/dashboardMhs" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-grid"></span><span class="mtext">Dasboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-upload1"></span><span class="mtext">Upload Dokumen</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="dashboardMhs/uploadTa">Dokumen Tugas Akhir</a></li>
                            <li>
                                <a href="/dashboardMhs/uploadRegis">Dokumen Registrasi</a>
                            </li>
                            <li><a href="/dashboardMhs/uploadPerpus">Dokumen Perpustakaan</a></li>
                            <li><a href="/dashboardMhs/uploadAkademik">Dokumen Akademik</a></li>
                        </ul>
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
                <div class="pull-left">
                    <a class="btn" href=""><i class="icon-copy dw dw-edit-1 ml-2 linked"></i>
                        Perbarui</a>
                </div>

                <div class="pull-right">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle dw dw-filter-1" href="#" role="button" data-toggle="dropdown">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Jurusan</a>
                            <a class="dropdown-item" href="#">Prodi</a>
                            <a class="dropdown-item" href="#">Status Bebas Masalah</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
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
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Revisi</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>
@endsection
