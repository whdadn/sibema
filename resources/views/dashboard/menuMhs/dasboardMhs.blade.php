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
                        <div class="weight-600 font-30 text-blue">Mahasiswa</div>
                    </h4>
                    <p class="font-18 max-width-600 text-danger">
                        {{ $mahasiswa->status_umum }}
                        <button type="button" class="btn btn-outline-info btn-sm">Print</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card d-grid gap-2 d-md-block">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tugas Akhir</h5>
                        @foreach ($tugas_akhir as $ta)
                            <p class="card-text text-center text-danger">
                                {{ $ta->status_ta }}</p>
                        @endforeach
                        <div class="d-grid gap-2 col-7 mx-auto">
                            <button class="btn btn-link" type="button">Lihat Rinci</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card d-grid gap-2 d-md-block">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registrasi</h5>
                        @foreach ($keuangan as $regis)
                            <p class="card-text text-center text-danger">{{ $regis->status_keuangan }}</p>
                        @endforeach
                        <div class="d-grid gap-2 col-7 mx-auto">
                            <button class="btn btn-link" type="button">Lihat Rinci</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card d-grid gap-2 d-md-block">
                    <div class="card-body">
                        <h5 class="card-title text-center">Perpustakaan</h5>
                        @foreach ($perpustakaan as $perpus)
                            <p class="card-text text-center text-danger">{{ $perpus->status_perpus }}</p>
                        @endforeach
                        <div class="d-grid gap-2 col-7 mx-auto">
                            <button class="btn btn-link" type="button">Lihat Rinci</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card d-grid gap-2 d-md-block">
                    <div class="card-body">
                        <h5 class="card-title text-center">Akademik</h5>
                        @foreach ($akademik as $akd)
                            <p class="card-text text-center text-danger">{{ $akd->status_akademik }}</p>
                        @endforeach
                        <div class="d-grid gap-2 col-7 mx-auto">
                            <button class="btn btn-link" type="button">Lihat Rinci</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
