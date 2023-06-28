<?php

namespace App\Http\Controllers;

use App\Models\keuangan;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::find(10);
        $tugas_akhir = $mahasiswa->tugas_akhir()->get();
        $keuangan = $mahasiswa->keuangan()->get();
        $perpustakaan = $mahasiswa->perpustakaan()->get();
        $akademik = $mahasiswa->akademik()->get();
        return view('dashboard.menuMhs.dasboardMhs', compact('mahasiswa', 'tugas_akhir', 'keuangan', 'perpustakaan', 'akademik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menuMhs.tambahDokRegis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = mahasiswa::find(10);
        $pegawai = pegawai::find(55);

        $validateData['dokumen_keuangan'] = $request->file('registrasi')->store('dokumenRegis');
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = $pegawai->id_pegawai;

        $fileRegis = $request->file('registrasi')->getClientOriginalName();

        $keuangan = new keuangan;
        $keuangan->dokumen_keuangan = $validateData['dokumen_keuangan'];
        $keuangan->dokumen_keuangan = $fileRegis;

        $keuangan->id_mahasiswa = $mahasiswa->id_mahasiswa;
        $keuangan->id_pegawai = $pegawai->id_pegawai;
        $keuangan->save();

        return redirect('/dashboardMhs/uploadRegis');
    }

    /**
     * Display the specified resource.
     */
    public function show(keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keuangan $keuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect('/dashboardMhs/uploadRegis');
    }

    public function showRegis(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
        $keuangan = $mahasiswa->keuangan()->get();

        return view('dashboard.menuMhs.uploadRegis', compact('keuangan', 'mahasiswa'));
    }
}
