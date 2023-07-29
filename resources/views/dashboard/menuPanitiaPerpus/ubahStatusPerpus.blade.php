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
                        <a href="/dashboardPanitiaPerpustakaan" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-grid"></span><span class="mtext">Dasboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class=" pd-20 card-box mb-30">

        <div class="clearfix justify-content-center">
            <div class="text-center mb-30">
                <h4>Ubah Status Bebas Masalah Perpustakaan</h4>
            </div>
        </div>
        <form action="/dashboardPanitiaPerpustakaan/ubahStatusPerpustakaan{{ $perpus->id_perpus }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Status Bebas Masalah</label>
                <select class="form-control" name="perpus" id="perpus">
                    <option value="Bermasalah">Bermasalah</option>
                    <option value="Bebas Masalah">Bebas Masalah</option>
                </select>
            </div>

            <div class="form-group">
                <label for="username">Rincian Status</label>
                <input type="text" name="rincian" class="form-control" id="rincian" placeholder="Rincian Status"
                    value="{{ old('rincian', $perpus->rincian_perpus) }}" />
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
@endsection
