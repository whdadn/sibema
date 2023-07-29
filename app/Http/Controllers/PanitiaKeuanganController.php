<?php

namespace App\Http\Controllers;

use App\Models\keuangan;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanitiaKeuanganController extends Controller
{
    public function index()
    {
        $mahasiswa = mahasiswa::with('akademik', 'keuangan', 'user', 'jurusan')->paginate(10);

        return view('dashboard.menuPanitiaKeuangan.dashboardPanitiaKeuangan', compact('mahasiswa'));
    }

    public function editKeuangan(keuangan $keuangan)
    {
        $keuangan = keuangan::find($keuangan->id_keuangan);
        return view('dashboard.menuPanitiaKeuangan.ubahStatusRegistrasi', compact('keuangan'));
    }

    public function updateKeuangan(keuangan $keuangan, Request $request)
    {
        $keuangan = keuangan::find($keuangan->id_keuangan);
        $pegawaiId = Auth::user()->pegawai->id_pegawai;

        $keuangan->status_keuangan = $request->regis;
        $keuangan->rincian_keuangan = $request->rincian;
        $keuangan->id_pegawai = $pegawaiId;
        $keuangan->save();

        return redirect('/dashboardPanitiaKeuangan');
    }

    public function viewKeuangan(keuangan $keuangan)
    {
        $keuangan = keuangan::find($keuangan->id_keuangan);

        return view('dashboard.menuPanitiaKeuangan.viewRegitrasi', compact('keuangan'));
    }

    public function edit(pegawai $pegawai)
    {
        $pegawai = auth()->user()->pegawai;

        return view('dashboard.menuPanitiaKeuangan.profilePanitiaKeuangan', compact('pegawai'));
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
