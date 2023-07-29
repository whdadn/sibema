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
                        <a href="/dashboardPanitiaPerpustakaan" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-grid"></span><span class="mtext">Dasboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-8">
            <div class="text-center mb-30">
                <h4>Detail Dokumen Peminjaman</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Bukti Peminjaman</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <iframe src="{{ asset('storage/' . $perpus->dokumen_perpus) }}" width="350px"
                            height="500px"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Keterangan</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <div class="left">
                            <p>{{ $perpus->keterangan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
