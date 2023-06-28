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
                    <h4>Perbarui Dokumen Tugas Akhir</h4>
                </div>
            </div>
        </div>
        <form action="/dashboardMhs/uploadTa/perbaruiDokTa{{ $tugas_akhir->first()->id_ta }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Lembar Persetujuan</label>
                <input type="hidden" name="oldPersetujuan" value="{{ $tugas_akhir->first()->lembar_persetujuan }}">
                <div class="custom-file">
                    <input type="file" name="persetujuan" id="persetujuan" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Lembar Pengesahan</label>
                <input type="hidden" name="oldPengesahan" value="{{ $tugas_akhir->first()->lembar_pengesahan }}">
                <div class="custom-file">
                    <input type="file" name="pengesahan" id="pengesahan" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Lembar Konsultasi Pembimbing Pertama</label>
                <input type="hidden" name="oldKonsul1" value="{{ $tugas_akhir->first()->lembar_konsul_pemb_1 }}">
                <div class="custom-file">
                    <input type="file" name="konsul1" id="konsul1" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Lembar Konsultasi Pembimbing Kedua</label>
                <input type="hidden" name="oldKonsul2" value="{{ $tugas_akhir->first()->lembar_konsul_pemb_2 }}">
                <div class="custom-file">
                    <input type="file" name="konsul2" id="konsul2" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Lembar Revisi</label>
                <input type="hidden" name="oldRevisi" value="{{ $tugas_akhir->first()->lembar_revisi }}">
                <div class="custom-file">
                    <input type="file" name="revisi" id="revisi" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary btn-sm">Perbarui</button>
        </form>
    </div>
@endsection
