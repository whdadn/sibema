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
                    <h4>Daftar Akun Panitia</h4>
                </div>
                <div class="pull-left mt-15">
                    <a href="/dashboardAdmin/akunPanitia/tambahAkunPanitia"><i class="bi bi-plus-circle"></i>
                        Tambah</a>
                </div>

            </div>

            <div class="table-responsive">
                <table class="table mt-2" id="data-table">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $pt)
                            @if ($pt->User->role != 'mahasiswa')
                                <tr class="clickable-row" data-id="{{ $pt->id_pegawai }}">
                                    <td>{{ $pt->User->email }}</td>
                                    <td>{{ $pt->User->username }}</td>
                                    <td>{{ $pt->nama_pegawai }}</td>
                                    <td>{{ $pt->User->role }}</td>
                                    <td><a href="/dashboardAdmin/akunPanitia/perbaruiAkunPanitia{{ $pt->User->id_user }}"><i
                                                class="icon-copy dw dw-edit-1 linked"></i></a>
                                    </td>
                                    <td>
                                        <form action="/dashboardAdmin/akunPanitia{{ $pt->id_user }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-link-red ml-1 p-0 btn-sm" id="1"
                                                onclick="return confirm('Yakin ingin hapus?')"><i
                                                    class="icon-copy dw dw-delete-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $pegawai->links() }}
    </div>
@endsection
