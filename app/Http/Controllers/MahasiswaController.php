<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\pegawai;
use App\Models\tugas_akhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        $mahasiswa = mahasiswa::find(10);
        return view('dashboard/menuMhs/tambahDokTa', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = mahasiswa::find(10);
        $pegawai = pegawai::find(55);

        $tugasAkhir = new tugas_akhir();
        $tugasAkhir->id_mahasiswa = $mahasiswa->id_mahasiswa;
        $tugasAkhir->id_pegawai = $pegawai->id_pegawai;

        if ($request->has('persetujuan')) {
            $request->file('persetujuan')->move('lembarPersetujuan/', $request->file('persetujuan')->getClientOriginalName());
            $tugasAkhir->lembar_persetujuan = $request->file('persetujuan')->getClientOriginalName();
        }

        if ($request->has('pengesahan')) {
            $request->file('pengesahan')->move('lembarPengesahan/', $request->file('pengesahan')->getClientOriginalName());
            $tugasAkhir->lembar_pengesahan = $request->file('pengesahan')->getClientOriginalName();
        }

        if ($request->has('konsul1')) {
            $request->file('konsul1')->move('lembarKonsul1/', $request->file('konsul1')->getClientOriginalName());
            $tugasAkhir->lembar_konsul_pemb_1 = $request->file('konsul1')->getClientOriginalName();
        }

        if ($request->has('konsul2')) {
            $request->file('konsul2')->move('lembarKonsul2/', $request->file('konsul2')->getClientOriginalName());
            $tugasAkhir->lembar_konsul_pemb_2 = $request->file('konsul2')->getClientOriginalName();
        }

        if ($request->has('revisi')) {
            $request->file('revisi')->move('lembarRevisi/', $request->file('revisi')->getClientOriginalName());
            $tugasAkhir->lembar_revisi = $request->file('revisi')->getClientOriginalName();
        }

        $tugasAkhir->save();

        return redirect('/dashboardMhs/uploadTa');
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
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
        $mahasiswa = mahasiswa::find(10);

        // Hapus relasi tugas akhir
        $mahasiswa->tugas_akhir()->delete();


        return redirect('/dashboardMhs/uploadTa');
    }

    public function showTa(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
        $tugas_akhir = $mahasiswa->tugas_akhir()->get();

        return view('dashboard.menuMhs.uploadTa', compact('tugas_akhir', 'mahasiswa'));
    }

    public function showRegis(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
        $keuangan = $mahasiswa->keuangan()->get();

        return view('dashboard.menuMhs.uploadRegis', compact('keuangan', 'mahasiswa'));
    }

    public function destroyRegis(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);

        $mahasiswa->keuangan()->delete();
        return redirect('/dashboardMhs/uploadRegis');
    }

    public function showPerpus(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
        $perpustakaan = $mahasiswa->perpustakaan()->get();

        return view('dashboard.menuMhs.uploadPerpus', compact('mahasiswa', 'perpustakaan'));
    }

    public function destroyPerpus(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);

        $mahasiswa->perpustakaan()->delete();
        return redirect('/dashboardMhs/uploadPerpus');
    }

    public function showAkademik(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
        $akademik = $mahasiswa->akademik()->get();

        return view('dashboard.menuMhs.uploadAkademik', compact('akademik', 'mahasiswa'));
    }

    public function destroyAkademik(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);

        $mahasiswa->akademik()->delete();
        return redirect('/dashboardMhs/uploadAkademik');
    }
}
