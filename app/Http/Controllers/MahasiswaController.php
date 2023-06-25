<?php

namespace App\Http\Controllers;

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

        $persetujuan = $request->file('persetujuan');
        $pengesahan = $request->file('pengesahan');
        $konsul1 = $request->file('konsul1');
        $konsul2 = $request->file('konsul2');
        $revisi = $request->file('revisi');

        // Simpan setiap file ke penyimpanan
        if ($persetujuan) {
            try {
                $path = $persetujuan->store('public');
                $tugasAkhir->lembar_persetujuan = $path;
            } catch (\Exception $e) {
                // Log or display the error message
                dd($e->getMessage());
            }
        }
        if ($pengesahan) {
            try {
                $path = $pengesahan->store('public');
                $tugasAkhir->lembar_pengesahan = $path;
            } catch (\Exception $e) {
                // Log or display the error message
                dd($e->getMessage());
            }
        }
        if ($konsul1) {
            try {
                $path = $konsul1->store('public');
                $tugasAkhir->lembar_konsul_pemb_1 = $path;
            } catch (\Exception $e) {
                // Log or display the error message
                dd($e->getMessage());
            }
        }
        if ($konsul2) {
            try {
                $path = $konsul2->store('public');
                $tugasAkhir->lembar_konsul_pemb_2 = $path;
            } catch (\Exception $e) {
                // Log or display the error message
                dd($e->getMessage());
            }
        }
        if ($revisi) {
            try {
                $path = $revisi->store('public/lembarPersetujuan');
                $tugasAkhir->lembar_revisi = $path;
            } catch (\Exception $e) {
                // Log or display the error message
                dd($e->getMessage());
            }
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
