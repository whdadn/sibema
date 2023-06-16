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
                            <li><a href="">Dokumen Tugas Akhir</a></li>
                            <li>
                                <a href="">Dokumen Registrasi</a>
                            </li>
                            <li><a href="">Dokumen Perpustakaan</a></li>
                            <li><a href="">Dokumen Akademik</a></li>
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
                    <h4>Dokumen Perpustakaan</h4>
                </div>
            </div>
        </div>
        <div class="clearfix mb-20">
            <div class="pull-left">
                <a href="/dashboard/tambahDokPerpus"><i class="bi bi-plus-circle"></i> Tambah</a>
                <a href="/dashboard/perbaruiDokPerpus"><i class="icon-copy dw dw-edit-1 ml-2 linked"></i> Perbarui</a>
                <a href="#"><i class="icon-copy dw dw-delete-2 ml-2"></i> Hapus</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Bukti Pengembalian</th>
                    <th scope="col">Keterangan</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
