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
                <h4>Status Bebas Masalah Akademik</h4>
            </div>

            <div class="pull-right mt-15">
                <div class="dropdown">
                    <a class="btn dropdown-toggle dw dw-filter-1" href="#" role="button" data-toggle="dropdown">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Jurusan</a>
                        <a class="dropdown-item" href="#">Status Bebas Masalah</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table" id="data-table">
            <thead>
                <tr>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">KHS Semester 1</th>
                    <th scope="col">KHS Semester 2</th>
                    <th scope="col">KHS Semester 3</th>
                    <th scope="col">KHS Semester 4</th>
                    <th scope="col">KHS Semester 5</th>
                    <th scope="col">KHS Semester 6</th>
                    <th scope="col">Lembar SP</th>
                    <th scope="col">Status Akademik</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr class="clickable-row" data-id="{{ $mhs->id_mahasiswa }}">
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama_mhs }}</td>
                        <td>{{ $mhs->jurusan->nama_jurusan }}</td>
                        <td>{{ $mhs->jurusan->nama_prodi }}</td>
                        <td>{{ $mhs->akademik->pluck('khs_semester_1')->implode(', ') }}</td>
                        <td>{{ $mhs->akademik->pluck('khs_semester_2')->implode(', ') }}</td>
                        <td>{{ $mhs->akademik->pluck('khs_semester_3')->implode(', ') }}</td>
                        <td>{{ $mhs->akademik->pluck('khs_semester_4')->implode(', ') }}</td>
                        <td>{{ $mhs->akademik->pluck('khs_semester_5')->implode(', ') }}</td>
                        <td>{{ $mhs->akademik->pluck('khs_semester_6')->implode(', ') }}</td>
                        <td>{{ $mhs->akademik->pluck('lembar_sp')->implode(', ') }}</td>
                        <td>{{ $mhs->akademik->pluck('status_akademik')->implode(', ') }}</td>
                        <td>
                            @if ($mhs->first() != null)
                                <a class="btn badge"
                                    href="/dashboardAdmin/ubahStatusAkademik{{ $mhs->akademik->pluck('id_akademik')->implode(', ') }}"><i
                                        class="icon-copy dw dw-edit-1 ml-2 linked"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    </div>
    {{ $mahasiswa->links() }}
@endsection
