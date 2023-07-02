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
                <h4>Berita Utama</h4>
            </div>
            <div class="pull-left mt-15">
                <a href="/dashboardAdmin/beritaUtama/tambahBeritaUtama"><i class="bi bi-plus-circle"></i>
                    Tambah</a>
            </div>
        </div>
        <table class="table mt-2" id="data-table">
            <thead>
                <tr>
                    <th scope="col">Judul Berita</th>
                    <th scope="col">Berita</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $brt)
                    <tr class="clickable-row" data-id="{{ $brt->id_berita }}">
                        <td>{{ $brt->judul_berita }}</td>
                        <td>{{ $brt->excerpt }}</td>
                        <td>
                            <a href="/dashboardAdmin/beritaUtama/perbaruiBeritaUtama{{ $brt->id_berita }}"><i
                                    class="icon-copy dw dw-edit-1 ml-2 linked"></i></a>
                        </td>
                        <td>
                            <form action="/dashboardAdmin/beritaUtama{{ $brt->id_berita }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf

                                <button class="btn btn-link-red ml-1 p-0 btn-sm" id="1"
                                    onclick="return confirm('Yakin ingin hapus?')"><i
                                        class="icon-copy dw dw-delete-2"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{ $berita->links() }}
@endsection
