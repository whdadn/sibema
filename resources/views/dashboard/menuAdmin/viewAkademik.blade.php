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
        <div class="clearfix mb-8">
            <div class="text-center mb-30">
                <h4>Detail Dokumen Akademik</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>KHS Semester 1</h5>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <iframe src="{{ asset('storage/' . $akademik->khs_semester_1) }}" width="350px"
                            height="500px"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Advanced</h5>
                            <p>For big businesses</p>
                        </div>
                        <div class="right">
                            <div class="pricing-price">
                                €15<span>/month</span>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <div class="pricing-points">
                            <ul>
                                <li>Everything in Standard</li>
                                <li>As much space as needed</li>
                                <li>Advanced admin controls</li>
                                <li>Dropbox Showcase</li>
                                <li>Tiered admin roles</li>
                                <li>Advanced user management tools</li>
                                <li>Domain verification</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cta">
                        <a href="#" class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Enterprise</h5>
                            <p>For enterprises</p>
                        </div>
                        <div class="right">
                            <div class="pricing-price">
                                €25<span>/month</span>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <div class="pricing-points">
                            <ul>
                                <li>Everything in Advanced</li>
                                <li>Account Capture</li>
                                <li>Network control</li>
                                <li>Enterprise management support</li>
                                <li>Domain Insights</li>
                                <li>Advanced training for end users</li>
                                <li>24/7 phone support</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cta">
                        <a href="#" class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-30">
                <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                        <div class="left">
                            <h5>Enterprise</h5>
                            <p>For enterprises</p>
                        </div>
                        <div class="right">
                            <div class="pricing-price">
                                €25<span>/month</span>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-card-body">
                        <div class="pricing-points">
                            <ul>
                                <li>Everything in Advanced</li>
                                <li>Account Capture</li>
                                <li>Network control</li>
                                <li>Enterprise management support</li>
                                <li>Domain Insights</li>
                                <li>Advanced training for end users</li>
                                <li>24/7 phone support</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cta">
                        <a href="#" class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
