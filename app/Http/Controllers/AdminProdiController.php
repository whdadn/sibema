<?php

namespace App\Http\Controllers;

use App\Models\akademik;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class AdminProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::with('akademik', 'tugas_akhir', 'keuangan', 'perpustakaan', 'user', 'jurusan')->paginate(10);

        return view('dashboard.menuAdmin.dashboardAdmin', compact('mahasiswa'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find($mahasiswa->id_mahasiswa);
        return view('dashboard.menuAdmin.ubahStatusUmum', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::find($mahasiswa->id_mahasiswa);

        $mahasiswa->status_umum = $request->umum;
        $mahasiswa->save();

        return redirect('/dashboardAdmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //
    }

    public function showAkademik(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::with('akademik', 'tugas_akhir', 'keuangan', 'perpustakaan', 'user', 'jurusan')->paginate(10);

        return view('dashboard.menuAdmin.statusAkademik', compact('mahasiswa'));
    }

    public function editAkademik(akademik $akademik)
    {
        $akademik = akademik::find($akademik->id_akademik);
        return view('dashboard.menuAdmin.ubahStatusAkademik', compact('akademik'));
    }

    public function updateAkademik(akademik $akademik, Request $request)
    {
        $akademik = akademik::find($akademik->id_akademik);

        $akademik->status_akademik = $request->akademik;
        $akademik->save();

        return redirect('/dashboardAdmin/statusAkademik');
    }
}
