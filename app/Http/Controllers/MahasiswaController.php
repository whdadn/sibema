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
    public function edit($id)
    {
        $mahasiswa = mahasiswa::findorfail('id');
        return view('dashboard.menuMhs.perbaruiDokTa', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lembar_pengesahan' => 'required',
            'lembar_persetujuan' => 'required',
            'lembar_konsul_pemb_1' => 'required',
            'lembar_konsul_pemb_2' => 'required',
            'lembar_revisi' => 'required',
        ]);

        $tugasAkhir = tugas_akhir::where('mahasiswa_id', $id)->first();

        // Cek apakah tugas akhir ditemukan untuk mahasiswa yang diberikan
        if (!$tugasAkhir) {
            return redirect()->back()->with('error', 'Tugas Akhir tidak ditemukan untuk mahasiswa ini.');
        }

        // Update data tugas_akhir
        $tugasAkhir->lembar_pengesahan = $request->lembar_pengesahan;
        $tugasAkhir->lembar_persetujuan = $request->lembar_persetujuan;
        $tugasAkhir->lembar_konsul_pemb_1 = $request->lembar_konsul_pemb_1;
        $tugasAkhir->lembar_konsul_pemb_2 = $request->lembar_konsul_pemb_2;
        $tugasAkhir->lembar_revisi = $request->lembar_revisi;

        // Simpan perubahan
        $tugasAkhir->save();

        return redirect()->back()->with('success', 'Perubahan berhasil disimpan.');
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
