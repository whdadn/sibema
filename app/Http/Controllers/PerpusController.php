<?php

namespace App\Http\Controllers;

use App\Models\perpustakaan;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;

class PerpusController extends Controller
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
        return view('dashboard.menuMhs.tambahDokPerpus');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::find(10);
        $pegawai = Pegawai::find(55);

        $validateData['keterangan'] = $request->keterangan;
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = $pegawai->id_pegawai;

        if ($request->hasFile('pengembalian')) {
            $validateData['dokumen_perpus'] = $request->file('pengembalian')->store('DokPengembalian');
        } else {
            $validateData['dokumen_perpus'] = null;
        }

        $ketPerpus = $request->keterangan;

        $perpus = new Perpustakaan();
        $perpus->dokumen_perpus = $validateData['dokumen_perpus'];
        $perpus->keterangan = $ketPerpus;
        $perpus->id_mahasiswa = $mahasiswa->id_mahasiswa;
        $perpus->id_pegawai = $pegawai->id_pegawai;
        $perpus->save();

        return redirect('/dashboardMhs/uploadPerpus');
    }

    /**
     * Display the specified resource.
     */
    public function show(perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(perpustakaan $perpustakaan)
    {
        $perpustakaan->delete();

        return redirect('/dashboardMhs/uploadPerpus');
    }

    public function showPerpus(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
        $perpustakaan = $mahasiswa->perpustakaan()->get();

        return view('dashboard.menuMhs.uploadPerpus', compact('mahasiswa', 'perpustakaan'));
    }

    public function viewPerpus(perpustakaan $perpus)
    {
        $perpus = perpustakaan::find($perpus->id_keuangan);

        return view('dashboard.menuMhs.viewperpus', compact('perpus'));
    }
}
