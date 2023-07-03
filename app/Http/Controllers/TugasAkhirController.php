<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerbaruiTaRequset;
use App\Models\akademik;
use App\Models\tugas_akhir;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find($mahasiswa->id_mahasiswa);
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
        $mahasiswa = auth()->user()->mahasiswa;
        $pegawai = auth()->user()->pegawai;

        $validateData['lembar_persetujuan'] = $request->file('persetujuan')->store('lembarPersetujuan');
        $validateData['lembar_pengesahan'] = $request->file('pengesahan')->store('lembarPengesahan');
        $validateData['lembar_konsul_pemb_1'] = $request->file('konsul1')->store('lembarKonsul1');
        $validateData['lembar_konsul_pemb_2'] = $request->file('persetujuan')->store('lembarKonsul2');
        $validateData['lembar_revisi'] = $request->file('persetujuan')->store('lembarRevisi');
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = null;

        $tugas_akhir = new tugas_akhir;
        $tugas_akhir->lembar_persetujuan = $validateData['lembar_persetujuan'];
        $tugas_akhir->lembar_pengesahan = $validateData['lembar_pengesahan'];
        $tugas_akhir->lembar_konsul_pemb_1 = $validateData['lembar_konsul_pemb_1'];
        $tugas_akhir->lembar_konsul_pemb_2 = $validateData['lembar_konsul_pemb_2'];
        $tugas_akhir->lembar_revisi = $validateData['lembar_revisi'];
        $tugas_akhir->id_mahasiswa = $mahasiswa->id_mahasiswa;

        if ($pegawai) {
            $tugas_akhir->id_pegawai = $pegawai->id_pegawai;
        } else {
            $tugas_akhir->id_pegawai = null;
        }

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
        $tugas_akhir = tugas_akhir::find($tugas_akhir->id_ta);
        return view('dashboard.menuMhs.perbaruiDokTa', compact('tugas_akhir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, tugas_akhir $tugas_akhir)
    {
        $mahasiswa = mahasiswa::find(10);
        $pegawai = pegawai::find(55);

        $tugas_akhir = tugas_akhir::find($tugas_akhir->id_ta);

        if ($request->file('persetujuan')) {
            if ($request->oldPersetujuan) {
                Storage::delete($request->oldPersetujuan);
            }

            $validateData['lembar_persetujuan'] = $request->file('persetujuan')->store('lembarPersetujuan');
            $filePersetujuan = $request->file('persetujuan')->getClientOriginalName();
            $tugas_akhir->lembar_persetujuan = $validateData['lembar_persetujuan'];
            $tugas_akhir->file_persetujuan = $filePersetujuan;
        }

        if ($request->file('pengesahan')) {
            if ($request->oldPengesahan) {
                Storage::delete($request->oldPengesahan);
            }

            $validateData['lembar_pengesahan'] = $request->file('pengesahan')->store('lembarPengesahan');
            $filePengesahan = $request->file('pengesahan')->getClientOriginalName();
            $tugas_akhir->lembar_pengesahan = $validateData['lembar_pengesahan'];
            $tugas_akhir->file_pengesahan = $filePengesahan;
        }

        if ($request->file('konsul1')) {
            if ($request->oldKonsul1) {
                Storage::delete($request->oldKonsul1);
            }

            $validateData['lembar_konsul_pemb_1'] = $request->file('konsul1')->store('lembarKonsul1');
            $fileKonsul1 = $request->file('konsul1')->getClientOriginalName();
            $tugas_akhir->lembar_konsul_pemb_1 = $validateData['lembar_konsul_pemb_1'];
            $tugas_akhir->file_konsul_pemb_1 = $fileKonsul1;
        }

        if ($request->file('konsul2')) {
            if ($request->oldKonsul2) {
                Storage::delete($request->oldKonsul2);
            }

            $validateData['lembar_konsul_pemb_2'] = $request->file('konsul2')->store('lembarKonsul2');
            $fileKonsul2 = $request->file('konsul2')->getClientOriginalName();
            $tugas_akhir->lembar_konsul_pemb_2 = $validateData['lembar_konsul_pemb_2'];
            $tugas_akhir->file_konsul_pemb_2 = $fileKonsul2;
        }

        if ($request->file('revisi')) {
            if ($request->oldRevisi) {
                Storage::delete($request->oldRevisi);
            }

            $validateData['lembar_revisi'] = $request->file('revisi')->store('lembarRevisi');
            $fileRevisi = $request->file('revisi')->getClientOriginalName();
            $tugas_akhir->lembar_revisi = $validateData['lembar_revisi'];
            $tugas_akhir->file_revisi = $fileRevisi;
        }

        $tugas_akhir->save();

        return redirect('/dashboardMhs/uploadTa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tugas_akhir $tugas_akhir, Request $request)
    {
        if ($tugas_akhir->lembar_persetujuan) {
            Storage::delete($tugas_akhir->lembar_persetujuan);
        }

        if ($tugas_akhir->lembar_pengesahan) {
            Storage::delete($tugas_akhir->lembar_pengesahan);
        }

        if ($tugas_akhir->lembar_konsul_pemb_1) {
            Storage::delete($tugas_akhir->lembar_konsul_pemb_1);
        }

        if ($tugas_akhir->lembar_konsul_pemb_2) {
            Storage::delete($tugas_akhir->lembar_konsul_pemb_2);
        }

        if ($tugas_akhir->lembar_revisi) {
            Storage::delete($tugas_akhir->lembar_revisi);
        }

        $tugas_akhir->delete();

        return redirect('/dashboardMhs/uploadTa');
    }

    public function showTa(mahasiswa $mahasiswa, akademik $tugas_akhir)
    {
        $mahasiswa = Mahasiswa::find($mahasiswa->id_mahasiswa);

        $tugas_akhir = tugas_akhir::all();

        return view('dashboard.menuMhs.uploadTa', compact('tugas_akhir', 'mahasiswa'));
    }

    public function viewTa(tugas_akhir $tugas_akhir)
    {
        $tugas_akhir = tugas_akhir::find($tugas_akhir->id_ta);

        return view('dashboard.menuMhs.viewTa', compact('tugas_akhir'));
    }
}
