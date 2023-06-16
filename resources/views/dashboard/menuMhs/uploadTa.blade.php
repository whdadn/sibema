@extends('dashboard.layouts.main')

@section('container')
    <div class="left-side-bar">

        <p class="text-light text-center">Politeknik Negeri Banjarmasin</p>
        <img class="rounded mx-auto d-block mb-3" src="/gambar/poliban.png" alt="Logo" width="95">

        <div class="menu-block
                customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="/dashboard" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-grid"></span><span class="mtext">Dasboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-upload1"></span><span class="mtext">Upload Dokumen</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="dashboard/uploadTa">Dokumen Tugas Akhir</a></li>
                            <li>
                                <a href="#">Dokumen Registrasi</a>
                            </li>
                            <li><a href="#">Dokumen Perpustakaan</a></li>
                            <li><a href="#">Dokumen Akademik</a></li>
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
                    <h4>Dokumen Tugas Akhir</h4>
                </div>
            </div>
        </div>
        <div class="clearfix mb-20">
            <div class="pull-left">
                <a href="/dashboard/tambahDokTa"><i class="bi bi-plus-circle"></i> Tambah</a>
                <a href="/dashboard/perbaruiDokTa"><i class="icon-copy dw dw-edit-1 ml-2 linked"></i> Perbarui</a>
                <a href="#"><i class="icon-copy dw dw-delete-2 ml-2"></i> Hapus</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Lembar Persetujuan</th>
                    <th scope="col">Lembar Pengesahan</th>
                    <th scope="col">Lembar Konsultasi Pembimbing Pertama</th>
                    <th scope="col">Lembar Konsultasi Pembimbing Kedua</th>
                    <th scope="col">Lembar Revisi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Revisi</td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
