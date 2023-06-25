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
                            <li><a href="/dashboardMhs/uploadTa">Dokumen Tugas Akhir</a></li>
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
                            @foreach ($tugas_akhir as $ta)
                                <button type="button" class="btn btn-link btn-sm" data-toggle="modal"
                                    data-target="#myTa{{ $ta->id_ta }}">Lihat
                                    Rinci</button>
                            @endforeach
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
                            @foreach ($keuangan as $regis)
                                <button type="button" class="btn btn-link btn-sm" data-toggle="modal"
                                    data-target="#myModal{{ $regis->id_regis }}">Lihat
                                    Rinci</button>
                            @endforeach
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
                            <!-- Trigger the modal with a button -->
                            @foreach ($perpustakaan as $perpus)
                                <button type="button" class="btn btn-link btn-sm" data-toggle="modal"
                                    data-target="#rincian{{ $perpus->id_perpus }}">Lihat Rinci</button>
                            @endforeach
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
                            @foreach ($akademik as $akd)
                                <button type="button" class="btn btn-link btn-sm" data-toggle="modal"
                                    data-target="#myModal{{ $akd->id_akademik }}">Lihat
                                    Rinci</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($akademik as $akd)
            <!-- Modal -->
            <div class="modal fade" id="myModal{{ $akd->id_akademik }}" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Permasalahan Akademik</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $akd->rincian_akademik }}.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($tugas_akhir as $ta)
            <!-- Modal -->
            <div class="modal fade" id="myTa{{ $ta->id_ta }}" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Permasalahan Tugas Akhir</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $ta->rincian_ta }}.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($keuangan as $regis)
            <!-- Modal -->
            <div class="modal fade" id="myModal{{ $regis->id_regis }}" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Permasalahan Registrasi</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $regis->rincian_keuangan }}.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($perpustakaan as $perpus)
            <!-- Modal -->
            <div class="modal fade" id="rincian{{ $perpus->id_perpus }}" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Permasalahan Perpustakaan</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $perpus->rincian_perpus }}.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
