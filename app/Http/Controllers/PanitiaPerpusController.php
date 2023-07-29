<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\pegawai;
use App\Models\perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanitiaPerpusController extends Controller
{
    public function index()
    {
        $mahasiswa = mahasiswa::with('akademik', 'keuangan', 'user', 'jurusan')->paginate(10);

        return view('dashboard.menuPanitiaPerpus.dashboardPanitiaPerpus', compact('mahasiswa'));
    }

    public function editPerpus(perpustakaan $perpus)
    {
        $perpus = perpustakaan::find($perpus->id_perpus);
        return view('dashboard.menuPanitiaPerpus.ubahStatusPerpus', compact('perpus'));
    }

    public function updatePerpus(perpustakaan $perpus, Request $request)
    {
        $perpus = perpustakaan::find($perpus->id_perpus);
        $pegawaiId = Auth::user()->pegawai->id_pegawai;

        $perpus->status_perpus = $request->perpus;
        $perpus->rincian_perpus = $request->rincian;
        $perpus->id_pegawai = $pegawaiId;
        $perpus->save();

        return redirect('/dashboardPanitiaPerpustakaan');
    }

    public function viewPerpus(perpustakaan $perpus)
    {
        $perpus = perpustakaan::find($perpus->id_perpus);

        return view('dashboard.menuPanitiaPerpus.viewPerpus', compact('perpus'));
    }

    public function edit(pegawai $pegawai)
    {
        $pegawai = auth()->user()->pegawai;

        return view('dashboard.menuPanitiaPerpus.profilePanitiaPerpus', compact('pegawai'));
    }

    public function update(Request $request, pegawai $pegawai)
    {
        $pegawai = pegawai::find($pegawai->id_pegawai);

        $pegawai->nama_pegawai = $request->nama;
        $pegawai->no_telepon_pegawai = $request->telpon;
        $pegawai->alamat_pegawai = $request->alamat;

        $pegawai->save();

        return back();
    }
}
