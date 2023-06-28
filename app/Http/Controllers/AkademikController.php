<?php

namespace App\Http\Controllers;

use App\Models\akademik;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;

class AkademikController extends Controller
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
        return view('dashboard.menuMhs.tambahDokAkademik');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = mahasiswa::find(10);
        $pegawai = pegawai::find(55);

        $validateData['khs_semester_1'] = $request->file('sem1')->store('KHSSem1');
        $validateData['khs_semester_2'] = $request->file('sem2')->store('KHSSem2');
        $validateData['khs_semester_3'] = $request->file('sem3')->store('KHSSem3');
        $validateData['khs_semester_4'] = $request->file('sem4')->store('KHSSem4');
        $validateData['khs_semester_5'] = $request->file('sem5')->store('KHSSem5');
        $validateData['khs_semester_6'] = $request->file('sem6')->store('KHSSem6');
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = $pegawai->id_pegawai;

        $fileSem1 = $request->file('sem1')->getClientOriginalName();
        $fileSem2 = $request->file('sem2')->getClientOriginalName();
        $fileSem3 = $request->file('sem3')->getClientOriginalName();
        $fileSem4 = $request->file('sem4')->getClientOriginalName();
        $fileSem5 = $request->file('sem5')->getClientOriginalName();
        $fileSem6 = $request->file('sem6')->getClientOriginalName();

        if ($request->hasFile('sp')) {
            $validateData['lembar_sp'] = $request->file('sp')->store('lembarSP');
            $fileSp = $request->file('sp')->getClientOriginalName();
        } else {
            $validateData['lembar_sp'] = null;
            $fileSp = null;
        }

        $akademik = new akademik;
        $akademik->khs_semester_1 = $validateData['khs_semester_1'];
        $akademik->khs_semester_2 = $validateData['khs_semester_2'];
        $akademik->khs_semester_3 = $validateData['khs_semester_3'];
        $akademik->khs_semester_4 = $validateData['khs_semester_4'];
        $akademik->khs_semester_5 = $validateData['khs_semester_5'];
        $akademik->khs_semester_6 = $validateData['khs_semester_6'];
        $akademik->lembar_sp = $validateData['lembar_sp'];
        $akademik->khs_semester_1 = $fileSem1;
        $akademik->khs_semester_2 = $fileSem2;
        $akademik->khs_semester_3 = $fileSem3;
        $akademik->khs_semester_4 = $fileSem4;
        $akademik->khs_semester_5 = $fileSem5;
        $akademik->khs_semester_6 = $fileSem6;
        $akademik->lembar_sp = $fileSp;
        $akademik->id_mahasiswa = $mahasiswa->id_mahasiswa;
        $akademik->id_pegawai = $pegawai->id_pegawai;
        $akademik->save();

        return redirect('/dashboardMhs/uploadAkademik');
    }

    /**
     * Display the specified resource.
     */
    public function show(akademik $akademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(akademik $akademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, akademik $akademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(akademik $akademik)
    {
        $akademik->delete();

        return redirect('/dashboardMhs/uploadAkademik');
    }

    public function showAkademik(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find(10);
        $akademik = $mahasiswa->akademik()->get();

        return view('dashboard.menuMhs.uploadAkademik', compact('akademik', 'mahasiswa'));
    }
}
