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
                    <h4>Dokumen Akademik</h4>
                </div>
            </div>
        </div>
        <div class="clearfix mb-20">
            <div class="pull-left">
                <a href="/dashboardMhs/uploadAkademik/tambahDokAkademik" class="btn btn-link-red ml-1 p-0"
                    id="add-button"><i class="bi bi-plus-circle"></i> Tambah</a>
                {{-- <a href="/dashboardMhs/uploadAkademik/perbaruiDokAkademik"><i
                        class="icon-copy dw dw-edit-1 ml-2 linked"></i> Perbarui</a> --}}

                @if ($akademik->first() != null)
                    <form action="/dashboardMhs/uploadAkademik{{ $akademik->first()->id_akademik }}" method="POST"
                        class="d-inline">
                        @method('delete')
                        @csrf

                        <button class="btn btn-link-red ml-1 p-0" onclick="return confirm('Yakin ingin hapus?')"><i
                                class="icon-copy dw dw-delete-2"></i>
                            Hapus</button>
                    </form>
                @endif
            </div>
        </div>

        <table class="table" id="data-table">
            <thead>
                <tr>
                    <th scope="col">KHS Semester 1</th>
                    <th scope="col">KHS Semester 2</th>
                    <th scope="col">KHS Semester 3</th>
                    <th scope="col">KHS Semester 4</th>
                    <th scope="col">KHS Semester 5</th>
                    <th scope="col">KHS Semester 6</th>
                    <th scope="col">Lembar SP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($akademik as $akd)
                    <tr class="clickable-row" data-id="{{ $akd->id_akademik }}">
                        <td>{{ $akd->khs_semester_1 }}</td>
                        <td>{{ $akd->khs_semester_2 }}</td>
                        <td>{{ $akd->khs_semester_3 }}</td>
                        <td>{{ $akd->khs_semester_4 }}</td>
                        <td>{{ $akd->khs_semester_5 }}</td>
                        <td>{{ $akd->khs_semester_6 }}</td>
                        <td>{{ $akd->lembar_sp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
