<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\mahasiswa;
use App\Models\pegawai;
use App\Models\tugas_akhir;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.menuMhs.dasboardMhs');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/menuMhs/tambahDokTa', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugas_akhir = $mahasiswa->tugas_akhir()->get();
        $keuangan = $mahasiswa->keuangan()->get();
        $perpustakaan = $mahasiswa->perpustakaan()->get();
        $akademik = $mahasiswa->akademik()->get();
        return view('dashboard.menuMhs.dasboardMhs', compact('mahasiswa', 'tugas_akhir', 'keuangan', 'perpustakaan', 'akademik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa $mahasiswa)
    {
        $mahasiswa = auth()->user()->mahasiswa;

        return view('dashboard.menuMhs.profileMhs', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa, jurusan $jurusan)
    {
        $jurusan = new jurusan;
        $jurusan->nama_jurusan = $request->jurusan;
        $jurusan->nama_prodi = $request->prodi;
        $jurusan->save();


        $mahasiswa = mahasiswa::find($mahasiswa->id_mahasiswa);

        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_mhs = $request->nama;
        $mahasiswa->no_telpon_mhs = $request->telpon;
        $mahasiswa->alamat_mhs = $request->alamat;
        $mahasiswa->tahun_lulus = $request->lulus;
        $mahasiswa->id_jurusan = $jurusan->id_jurusan;
        $mahasiswa->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
    }

    public function cetakStatus(mahasiswa $mahasiswa)
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugas_akhir = $mahasiswa->tugas_akhir()->get();
        $keuangan = $mahasiswa->keuangan()->get();
        $perpustakaan = $mahasiswa->perpustakaan()->get();
        $akademik = $mahasiswa->akademik()->get();

        return view('dashboard.menuMhs.cetakMhs', compact('mahasiswa'));
    }
}
