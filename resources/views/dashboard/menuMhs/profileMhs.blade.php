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

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">

                            <h5 class="text-center h5 mb-0">{{ $mahasiswa->nama_mhs }}</h5>
                            <p class="text-center text-muted font-14">{{ $mahasiswa->jurusan->nama_jurusan ?? '' }}</p>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Information</h5>
                                <ul>
                                    <li>
                                        <span>Program Studi:</span>
                                        {{ $mahasiswa->jurusan->nama_prodi ?? '' }}
                                    </li>
                                    <li>
                                        <span>Nomor Telepon:</span>
                                        {{ $mahasiswa->no_telepon_mhs }}
                                    </li>
                                    <li>
                                        <span>Tahun Lulus:</span>
                                        {{ $mahasiswa->tahun_lulus }}
                                    </li>
                                    <li>
                                        <span>Alamat:</span>
                                        {{ $mahasiswa->alamat_mhs }}
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
                                                <form action="/dashboardMhs/profileMhs{{ $mahasiswa->id_mahasiswa }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-6">
                                                            <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                                            <div class="form-group">
                                                                <label>Nim</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="nim" id="nim">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="nama" id="nama">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Jurusan</label>
                                                                <select class="selectpicker form-control form-control-lg"
                                                                    data-style="btn-outline-secondary btn-lg"
                                                                    title="Pilih Jurusan" name="jurusan" id="jurusan">
                                                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Program Studi</label>
                                                                <select class="selectpicker form-control form-control-lg"
                                                                    data-style="btn-outline-secondary btn-lg"
                                                                    title="Pilih Program Studi" name="prodi"
                                                                    id="prodi">
                                                                    <option value="Alat Berat">Alat Berat</option>
                                                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                                                    <option
                                                                        value="Tata Operasi dan Pemeliharaan Prediktif Alat
                                                                    Berat">
                                                                        Tata Operasi dan Pemeliharaan Prediktif Alat
                                                                        Berat</option>
                                                                    <option value="Teknologi Rekayasa Otomotif">Teknologi
                                                                        Rekayasa Otomotif</option>
                                                                    <option value="Teknik Listrik">Teknik Listrik</option>
                                                                    <option value="Teknik Elektronika">Teknik Elektronika
                                                                    </option>
                                                                    <option value="Teknologi Rekayasa Pembangkit Energi">
                                                                        Teknologi Rekayasa Pembangkit Energi</option>
                                                                    <option value="Teknik Informatika">Teknik Informatika
                                                                    </option>
                                                                    <option value="Teknologi Rekayasa Otomasi">Teknologi
                                                                        Rekayasa Otomasi</option>
                                                                    <option value="Sistem Informasi Kota Cerdas">Sistem
                                                                        Informasi Kota Cerdas</option>
                                                                </select>
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

                                                            <div class="form-group">
                                                                <label>Tahun Lulus</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="lulus" id="lulus">
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
