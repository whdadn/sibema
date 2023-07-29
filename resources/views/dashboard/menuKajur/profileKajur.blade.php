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

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">

                            <h5 class="text-center h4 mb-2">{{ $pegawai->nama_pegawai }}</h5>
                            <p class="text-center text-muted font-14">{{ $pegawai->user->role }}</p>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Information</h5>
                                <ul>
                                    <li>
                                        <span>Nomor Telepon:</span>
                                        {{ $pegawai->no_telepon_pegawai }}
                                    </li>

                                    <li>
                                        <span>Alamat:</span>
                                        {{ $pegawai->alamat_pegawai }}
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                        <div class="card-box height-100-p overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Lengkapi
                                                Data Diri</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Setting Tab start -->
                                        <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                                            <div class="profile-setting">
                                                <form
                                                    action="/dashboardPanitiaPerpustakaan/profilePanitiaPerpustakaan{{ $pegawai->id_pegawai }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-6">
                                                            <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="nama" id="nama">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Nomor Telepon</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="telpon" id="telpon">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="alamat" id="alamat">
                                                            </div>

                                                            <div class="form-group mb-0">
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Simpan">
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Setting Tab End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
