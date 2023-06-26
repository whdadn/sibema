<?php

namespace App\Http\Controllers;

use App\Models\tugas_akhir;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;

class TugasAkhirController extends Controller
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
        return view('dashboard.menuMhs.tambahDokTa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::find(10);
        $pegawai = Pegawai::find(55);

        $validateData['lembar_persetujuan'] = $request->file('persetujuan')->store('lembarPersetujuan');
        $validateData['lembar_pengesahan'] = $request->file('pengesahan')->store('lembarPengesahan');
        $validateData['lembar_konsul_pemb_1'] = $request->file('konsul1')->store('lembarKonsul1');
        $validateData['lembar_konsul_pemb_2'] = $request->file('persetujuan')->store('lembarKonsul2');
        $validateData['lembar_revisi'] = $request->file('persetujuan')->store('lembarRevisi');
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = $pegawai->id_pegawai;

        $filePersetujuan = $request->file('persetujuan')->getClientOriginalName();
        $filePengesahan = $request->file('pengesahan')->getClientOriginalName();
        $fileKonsul1 = $request->file('konsul1')->getClientOriginalName();
        $fileKonsul2 = $request->file('persetujuan')->getClientOriginalName();
        $fileRevisi = $request->file('persetujuan')->getClientOriginalName();

        $tugas_akhir = new tugas_akhir;
        $tugas_akhir->lembar_persetujuan = $validateData['lembar_persetujuan'];
        $tugas_akhir->lembar_pengesahan = $validateData['lembar_pengesahan'];
        $tugas_akhir->lembar_konsul_pemb_1 = $validateData['lembar_konsul_pemb_1'];
        $tugas_akhir->lembar_konsul_pemb_2 = $validateData['lembar_konsul_pemb_2'];
        $tugas_akhir->lembar_revisi = $validateData['lembar_revisi'];
        $tugas_akhir->lembar_persetujuan = $filePersetujuan;
        $tugas_akhir->lembar_pengesahan = $filePengesahan;
        $tugas_akhir->lembar_konsul_pemb_1 = $fileKonsul1;
        $tugas_akhir->lembar_konsul_pemb_2 = $fileKonsul2;
        $tugas_akhir->lembar_revisi = $fileRevisi;
        $tugas_akhir->id_mahasiswa = $mahasiswa->id_mahasiswa;
        $tugas_akhir->id_pegawai = $pegawai->id_pegawai;
        $tugas_akhir->save();

        return redirect('/dashboardMhs/uploadTa');
    }

    /**
     * Display the specified resource.
     */
    public function show(tugas_akhir $tugas_akhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tugas_akhir $tugas_akhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tugas_akhir $tugas_akhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tugas_akhir $tugas_akhir)
    {
        //
    }
}
