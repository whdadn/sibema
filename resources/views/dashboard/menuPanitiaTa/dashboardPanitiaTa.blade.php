@extends('dashboard.layouts.utama')

@section('container')
    <div class="container-fluid">
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

        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="vendors/images/banner-img.png" alt="" />
                    </div>
                    <div class="col-md-8 mt-30">
                        <h4 class="font-20 weight-500 mb-30 text-capitalize">
                            Selamat Datang
                            <div class="weight-600 font-30 text-blue">Panitia Tugas Akhir</div>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-8">
                    <div class="text-center mb-30">
                        <h4>Status Bebas Masalah Tugas Akhir</h4>
                    </div>

                    <div class="pull-right mt-15">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle dw dw-filter-1" href="#" role="button"
                                data-toggle="dropdown">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-status="bermasalah">Bermasalah</a>
                                <a class="dropdown-item" href="#" data-status="bebas-masalah">Bebas Masalah</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">Nim</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Status Tugas Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $mhs)
                                <tr class="clickable-row" data-id="{{ $mhs->id_mahasiswa }}">
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->nama_mhs }}</td>
                                    <td>{{ $mhs->jurusan->nama_jurusan ?? '' }}</td>
                                    <td>{{ $mhs->jurusan->nama_prodi ?? '' }}</td>
                                    <td>{{ $mhs->tugas_akhir->pluck('status_ta')->implode(', ') }}</td>
                                    <td><a class="btn ml-n5"
                                            href="/dashboardPanitiaTa/statusTa/detail{{ $mhs->tugas_akhir->pluck('id_ta')->implode(', ') }}"><i
                                                class="icon-copy dw dw-eye mr-n5"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($mhs->first() != null)
                                            <a class="btn ml-n4"
                                                href="/dashboardPanitiaTa/ubahStatusTa{{ $mhs->tugas_akhir->pluck('id_ta')->implode(', ') }}"><i
                                                    class="icon-copy dw dw-edit-1 ml-2 linked"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        {{ $mahasiswa->links() }}
    </div>
@endsection
