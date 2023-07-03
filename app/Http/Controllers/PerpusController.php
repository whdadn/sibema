<?php

namespace App\Http\Controllers;

use App\Models\perpustakaan;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;
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
        $mahasiswa = auth()->user()->mahasiswa;
        $pegawai = auth()->user()->pegawai;

        $validateData['keterangan'] = $request->keterangan;
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = null;

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

        if ($pegawai) {
            $perpus->id_pegawai = $pegawai->id_pegawai;
        } else {
            $perpus->id_pegawai = null;
        }

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
        if ($perpustakaan->dokumen_perpus) {
            Storage::delete($perpustakaan->dokumen_perpus);
        }

        $perpustakaan->delete();

        return redirect('/dashboardMhs/uploadPerpus');
    }

    public function showPerpus(mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($mahasiswa->id_mahasiswa);

        $perpustakaan = perpustakaan::all();


        return view('dashboard.menuMhs.uploadPerpus', compact('mahasiswa', 'perpustakaan'));
    }

    public function viewPerpus(perpustakaan $perpus)
    {
        $perpus = perpustakaan::find($perpus->id_keuangan);

        return view('dashboard.menuMhs.viewperpus', compact('perpus'));
    }
}
