<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;

class KajurController extends Controller
{
    public function index()
    {
        $mahasiswa = mahasiswa::with('jurusan')->paginate(10);

        return view('dashboard.menuKajur.dashboardKajur', compact('mahasiswa'));
    }

    public function edit(pegawai $pegawai)
    {
        $pegawai = auth()->user()->pegawai;

        return view('dashboard.menuKajur.profileKajur', compact('pegawai'));
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

    public function filter(Request $request)
    {
        $statusUmum = $request->input('status_umum');

        // Query atau filter data mahasiswa berdasarkan $statusUmum
        $mahasiswa = mahasiswa::query();

        if ($statusUmum === 'bebas_masalah') {
            $mahasiswa->where('status_umum', 'bebas masalah');
        } elseif ($statusUmum === 'bermasalah') {
            $mahasiswa->where('status_umum', 'bermasalah');
        }

        $mahasiswa = $mahasiswa->paginate(10);

        return view('dashboard.menuKajur.dashboardKajur', [
            'statusUmum' => $statusUmum,
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
