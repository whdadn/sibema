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
                        <a href="/dashboardPanitiaTa" class="dropdown-toggle no-arrow">
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
                <h4>Detail Dokumen Tugas Akhir</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Lembar Persetujuan</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <iframe src="{{ asset('storage/' . $tugas_akhir->lembar_persetujuan) }}" width="350px"
                            height="500px"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Lembar Pengesahan</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <iframe src="{{ asset('storage/' . $tugas_akhir->lembar_pengesahan) }}" width="350px"
                            height="500px"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Lembar Konsul Pembimbing 1</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <iframe src="{{ asset('storage/' . $tugas_akhir->lembar_konsul_pemb_1) }}" width="350px"
                            height="500px"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Lembar Konsul Pembimbing 2</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <iframe src="{{ asset('storage/' . $tugas_akhir->lembar_konsul_pemb_2) }}" width="350px"
                            height="500px"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Lembar Revisi</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <iframe src="{{ asset('storage/' . $tugas_akhir->lembar_revisi) }}" width="350px"
                            height="500px"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
@endsection
