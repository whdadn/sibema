<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(20);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //
    }

    public function showTa(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(20);
        $tugas_akhir = $mahasiswa->tugas_akhir()->get();

        return view('dashboard.menuMhs.uploadTa', compact('tugas_akhir'));
    }

    public function showRegis(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(20);
        $keuangan = $mahasiswa->keuangan()->get();

        return view('dashboard.menuMhs.uploadRegis', compact('keuangan'));
    }

    public function showPerpus(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(20);
        $perpustakaan = $mahasiswa->perpustakaan()->get();

        return view('dashboard.menuMhs.uploadPerpus', compact('perpustakaan'));
    }

    public function showAkademik(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(20);
        $akademik = $mahasiswa->akademik()->get();

        return view('dashboard.menuMhs.uploadAkademik', compact('akademik'));
    }
}
