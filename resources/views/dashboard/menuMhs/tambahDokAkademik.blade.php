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

    <div class="pd-20 card-box mb-30">
        <div class="row justify-content-center mb-lg-5">
            <div class="col-md-6 col-sm-12">
                <div class="title text-center mb-45">
                    <h4>Tambah Dokumen Akademik</h4>
                </div>
            </div>
        </div>
        <form action="/dashboardMhs/uploadAkademik/tambahDokAkademik" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>KHS Semester 1</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="sem1" id="sem1" required>
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>KHS Semester 2</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="sem2" id="sem2" required>
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>KHS Semester 3</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="sem3" id="sem3" required>
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>KHS Semester 4</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="sem4" id="sem4" required>
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>KHS Semester 5</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="sem5" id="sem5" required>
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>KHS Semester 6</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="sem6" id="sem6" required>
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Lembar SP</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="sp" id="sp">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
